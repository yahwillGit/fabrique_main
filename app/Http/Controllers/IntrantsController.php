<?php

namespace App\Http\Controllers;

use App\Intrants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IntrantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $intrants = Intrants::all(); 
        return view('pages.intrants.index', compact('intrants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.intrants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Intrants::create($request->all());

        return Redirect::route('intrants.index')->with('success','Opération éffectuer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Intrants  $intrants
     * @return \Illuminate\Http\Response
     */
    public function show(Intrants $intrants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Intrants  $intrants
     * @return \Illuminate\Http\Response
     */
    public function edit(Intrants $intrants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Intrants  $intrants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intrants $intrants,$id)
    {
        //
        $intrants = Intrants::find($id);

        //ensuite je passe a la mise à jour
        $intrants->nom = Request('nom');
        $intrants->unite = Request('unite');
        $intrants->quantite_totale = Request('quantite_totale');
        $intrants->quantite_seuil = Request('quantite_seuil');
        $intrants->prix_standard = Request('prix_standard');

        $intrants->save();

        return back()->with('success','Informations mise-à-jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Intrants  $intrants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intrants $intrants,$id)
    {
        //
        Intrants::destroy($id);

        return back()->with('success','Intrant supprimé avec succès');
    }
}
