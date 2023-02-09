<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Facture;
use App\Produits;
use App\ClientProduit;
use App\Recette;
use Carbon\Carbon;
use ConsoleTVs\Invoices\Classes\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Clients::all();
        $produits = Produits::all();
        return view('pages.ventes.index', compact('clients','produits'));
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
      $nombre = count($request->quantite);
      $client_id =$request->client;
      $total = 0;

      $items = array();
      if ($nombre > 0) {
        for ($i=0; $i < $nombre; $i++) {
            $store = new ClientProduit;
            $store->qte = $request->quantite[$i];
            $store->date_vente = date("Y-m-d");
            $store->produit_id = $request->produit[$i];
            $store->client_id = $client_id;

            $produits = Produits::find($request->produit[$i]);
            $produits->qte_stock -= $request->quantite[$i];
            $produits->save();
            $total += $produits->prix_standard * $request->quantite[$i];
            $store->save();

            /*$items [] = Collection::make([
                'name'       => $produits->libelle,
                'price'      => $produits->prix_standard,
                'ammount'    => $nombre,
            ]);*/
        }
        }
        $clt = DB::table('clients','clients.id','=',$client_id)->first();
        $recettes = new Recette();
        $recettes->libelle = 'Vente du client '.$clt->nom.'';
        $recettes->date = date("Y-m-d");
        $recettes->montant=$total;
        $recettes->typerecette_id = 1;
        $recettes->save();

        $invoice = Invoice::make()
            ->addItem('Test Item', 10.25, 2, 1412)
            ->addItem('Test Item 2', 5, 2, 923)
            ->addItem('Test Item 3', 15.55, 5, 42)
            ->with_pagination(true)
            ->duplicate_header(true)
            ->due_date(Carbon::now()->addMonths(1))
            ->customer([
                'name'      => 'Èrik Campobadal Forés',
                'id'        => '12345678A',
                'phone'     => '+34 123 456 789',
                'location'  => 'C / Unknown Street 1st',
                'zip'       => '08241',
                'city'      => 'Manresa',
                'country'   => 'Spain',
            ])
            ->save('public/myinvoicename.pdf');

        $facture = new Facture();
        $facture->client_id = $clt->id;
        $facture->montant_ht = $total;
        $facture->montant_reste = $total;
        $facture->save();
        $facture->fichier = 'factures/'. $facture->id.'.pdf';
        $facture->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientProduit  $clientProduit
     * @return \Illuminate\Http\Response
     */
    public function show(ClientProduit $clientProduit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientProduit  $clientProduit
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientProduit $clientProduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientProduit  $clientProduit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientProduit $clientProduit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientProduit  $clientProduit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientProduit $clientProduit)
    {
        //
    }
}
