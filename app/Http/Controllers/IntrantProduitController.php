<?php

namespace App\Http\Controllers;

use App\IntrantProduit;
use App\Produits;
use App\Intrants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IntrantProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $intrantproduits = Intrantproduit::all(); 
        $intrants = Intrants::all(); 
        $produits = Produits::all();
        return view('pages.intrantproduits.index', compact('intrantproduits','intrants','produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $intrants = Intrants::all(); 
        $produits = Produits::all(); 
        return view('pages.intrantproduits.create',compact('intrants','produits'));
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
        Intrantproduit::create($request->all());

        return Redirect::route('intrantproduits.index')->with('success','Opération éffectuer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IntrantProduit  $intrantProduit
     * @return \Illuminate\Http\Response
     */
    public function show(IntrantProduit $intrantProduit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IntrantProduit  $intrantProduit
     * @return \Illuminate\Http\Response
     */
    public function edit(IntrantProduit $intrantProduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IntrantProduit  $intrantProduit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IntrantProduit $intrantProduit, $id)
    {
        //
        $intrantproduits = Intrantproduit::find($id);

        //ensuite je passe a la mise à jour
        $intrantproduits->produit_id = Request('produit_id');
        $intrantproduits->intrant_id = Request('intrant_id');
        $intrantproduits->quantite_produit = Request('quantite_produit');
        $intrantproduits->quantite_intrant = Request('quantite_intrant');

        $intrantproduits->save();

        return back()->with('success','Informations mise-à-jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IntrantProduit  $intrantProduit
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntrantProduit $intrantProduit, $id)
    {
        //
        Intrantproduit::destroy($id);

        return back()->with('success','Intrant supprimé avec succès');
    }
}
