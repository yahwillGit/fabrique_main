<?php

namespace App\Http\Controllers;

use App\Production;
use App\Employes;
use App\Produits;
use App\Intrants;
use App\IntrantProduction;
use App\ProduitProduction;
use App\EmployeProduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employes = Employes::all();
        $intrants = Intrants::all();
        $produits = Produits::all();
        return view('pages.productions.index', compact('employes','intrants','produits'));
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
      $productions = new Production;
      $productions->date_production = date("Y-m-d");

      $productions->save();

      $productions = DB::table('productions')->latest('id')->first();
      $nombre = count($request->quantite);
      $nombre1 = count($request->qte_reel);
      $nombre2 = count($request->employe);
      if ($nombre > 0) {

          # code...
        for ($i=0; $i < $nombre; $i++) {
            # code...
            $store = new IntrantProduction;
            $store->qte = $request->quantite[$i];
            $store->intrant_id = $request->intrant[$i];
            $store->production_id = $productions->id;

            $intrants = Intrants::find($request->intrant[$i]);
            $intrants->quantite_totale -= $request->quantite[$i];
            $intrants->save();

            $store->save();

        }
        }

        if ($nombre1 > 0) {

          # code...
        for ($i=0; $i < $nombre1; $i++) {
            # code...
            $store = new ProduitProduction;
            $store->qte_reel = $request->qte_reel[$i];
            $store->produit_id = $request->produit[$i];
            $store->production_id = $productions->id;

            $produits = Produits::find($request->produit[$i]);
            $produits->qte_stock += $request->qte_reel[$i];
            $produits->save();

            $store->save();

        }
        }
        if ($nombre2 > 0) {

          # code...
        for ($i=0; $i < $nombre2; $i++) {
            # code...
            $store = new EmployeProduction;
            $store->employe_id = $request->employe[$i];
            $store->production_id = $productions->id;

            $store->save();

        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        //
    }

    public function liste()
    {
        # code...
        $productions = Production::all();
        return view('pages.productions.liste', compact('productions'));
    }
}
