<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $factures = Facture::all();
        return view('pages.factures.index',compact('factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::all();
        return view('pages.factures.create',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Facture::insert([
            'created_at' => date("Y-m-d"),
            'commentaire' => $request->commentaire,
            'client_id' => $request->client,
            'montant_ht' => $request->montant_ht,
            'montant_tva' => $request->montant_tva,
            'remise' => $request->remise,
            'ristourne' => $request->ristourne,
            'montant_ttc' => $request->montant_ttc,
            'montant_reste' => $request->montant_reste,
            'fichier' => $request->fichier
        ]);
        return redirect()->route('factures.index');
    }

    public function ristourne(Request $request){
        $facture = Facture::find($request->facture_id);
        $facture->ristourne = $request->ristourne;
        $facture->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facture  $facture
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Facture $facture)
    {
        return view('pages.factures.show',compact('facture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        //
    }
}
