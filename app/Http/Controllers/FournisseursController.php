<?php

namespace App\Http\Controllers;

use App\Fournisseurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fournisseurs = Fournisseurs::all(); 
        return view('pages.fournisseurs.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.fournisseurs.create');
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
        Fournisseurs::create($request->all());

        return Redirect::route('fournisseurs.index')->with('ok',trans('fournisseur.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseurs  $fournisseurs
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseurs $fournisseurs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseurs  $fournisseurs
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseurs $fournisseurs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseurs  $fournisseurs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseurs $fournisseurs, $id)
    {
        //
        $fournisseurs = Fournisseurs::find($id);

        //ensuite je passe a la mise à jour
        $fournisseurs->nom = Request('nom');
        $fournisseurs->adresse = Request('adresse');
        $fournisseurs->telephone = Request('telephone');
        $fournisseurs->email = Request('email');

        $fournisseurs->save();

        return back()->with('success','Informations mise-à-jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseurs  $fournisseurs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseurs $fournisseurs, $id)
    {
        //
        Fournisseurs::destroy($id);

        return back()->with('success','Fournisseur supprimé avec succès');
        //return Redirect::route('fournisseurs.index')->with('ok',trans('fournisseur.store'));

    }
}
