<?php

namespace App\Http\Controllers;

use App\Approvisionnement;
use App\Depense;
use App\Fournisseurs;
use App\Intrants;
use App\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $approvisionnements = DB::table('approvisionnements')
        ->join('intrants','intrants.id','=','approvisionnements.intrant_id')
        ->join('fournisseurs','fournisseurs.id','=','approvisionnements.fournisseur_id')
        ->select('fournisseurs.nom as nom_four','intrants.nom as nom_intrant','approvisionnements.*')
        ->get();
        return view('pages.approvisionnements.index', compact('approvisionnements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        $fournisseurs = Fournisseurs::all();
        $intrants = Intrants::all();

        return view('pages.approvisionnements.create', compact('fournisseurs','intrants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Approvisionnement::create($request->all());
        $intrants = Intrants::find($request->intrant_id);
        $intrants->quantite_totale += $request->quantite;
        $intrants->save();
        $depense = new Depense();
        $depense->libelle = 'Approvisionement en '.$intrants->nom;
        $depense->date = date("Y-m-d");
        $depense->montant=$request->prix_ttc;
        $depense->typedepense_id = 1;
        $depense->save();

        $validation = new Validation();
        $validation->designation = 'Approvisionement en '.$intrants->nom;
        $validation->montant_propose = $request->prix_ttc;
        $validation->user_id = auth()->id();
        $validation->save();

        return Redirect::route('approvisionnements.index')->with('success','Opération éffectuée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function show(Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //

        $approvisionnements = Approvisionnement::find($id);

        $fournisseurs = Fournisseurs::all();
        $intrants = Intrants::all();
        return view('pages.approvisionnements.edit', compact('approvisionnements','fournisseurs','intrants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //

        $approvisionnements = Approvisionnement::find($id);

        //ensuite je passe a la mise à jour
        $approvisionnements->fournisseur_id = Request('fournisseur_id');
        $approvisionnements->intrant_id = Request('intrant_id');
        $approvisionnements->date = Request('date');
        $approvisionnements->facture = Request('facture');
        $approvisionnements->commentaire = Request('commentaire');
        $approvisionnements->prix_unitaire = Request('prix_unitaire');
        $approvisionnements->quantite = Request('quantite');
        $approvisionnements->prix_ttc = Request('prix_ttc');

        $approvisionnements->save();

        return Redirect::route('approvisionnements.index')->with('success','Informations mise-à-jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( $id)
    {
        //
        Approvisionnement::destroy($id);

        return back()->with('success','Suppression éffectuée avec succès');
    }
}
