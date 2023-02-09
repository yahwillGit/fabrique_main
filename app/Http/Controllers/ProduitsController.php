<?php

namespace App\Http\Controllers;

use App\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produits = Produits::all(); 
        return view('pages.produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.produits.create');
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
        Produits::create($request->all());

        return Redirect::route('produits.index')->with('success','Opération éffectuer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function show(Produits $produits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function edit(Produits $produits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produits $produits, $id)
    {
        //
        $produits = Produits::find($id);

        //ensuite je passe a la mise à jour
        $produits->nom = Request('nom');
        $produits->description = Request('description');
        $produits->prix_standard = Request('prix_standard');

        $produits->save();

        return back()->with('success','Informations mise-à-jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produits $produits, $id)
    {
        //
        Produits::destroy($id);

        return back()->with('success','Clients supprimé avec succès');
    }
}
