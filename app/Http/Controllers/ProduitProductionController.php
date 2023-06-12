<?php

namespace App\Http\Controllers;

use App\Intrants;
use App\ProduitProduction;
use App\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produitproductions = DB::table('produit_productions')
        ->join('produits','produits.id','=','produit_productions.produit_id')
        ->select('produits.nom as nom_prod')
        ->get();
        $produits = Produits::all();
        return view('pages.produitproductions.index', compact('produitproductions','produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProduitProduction  $produitProduction
     * @return \Illuminate\Http\Response
     */
    public function show(ProduitProduction $produitProduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProduitProduction  $produitProduction
     * @return \Illuminate\Http\Response
     */
    public function edit(ProduitProduction $produitProduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProduitProduction  $produitProduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProduitProduction $produitProduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProduitProduction  $produitProduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProduitProduction $produitProduction)
    {
        //
    }
}
