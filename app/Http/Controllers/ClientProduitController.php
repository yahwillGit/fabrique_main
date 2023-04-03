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
use Illuminate\Support\Collection;

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
        $clientproduit = ClientProduit::orderBy("id", "desc")->get(); // Better when it's descending
        $clients = Clients::all();
        $produits = Produits::all();
        return view('pages.ventes.index', compact('clientproduit','clients','produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientproduit = ClientProduit::all();
        $clients = Clients::all();
        $produits = Produits::all();
        return view('pages.ventes.create', compact('clientproduit','clients','produits'));
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
      // Create the invoice here and update it later
      $invoice = Invoice::make();

      $items = array();
      if ($nombre > 0) {
        for ($i=0; $i < $nombre; $i++) {
            $store = new ClientProduit;
            $store->qte = $request->quantite[$i];
            $store->date_vente = date("Y-m-d");
            $store->produit_id = $request->produit[$i];
            $store->client_id = $client_id;

            // Seriously ? Think of a way to refactor var names, it's only one product here
            $produits = Produits::find($request->produit[$i]);
            $produits->qte_stock -= $request->quantite[$i];
            $produits->save();
            $total += $produits->prix_standard * $request->quantite[$i];
            $store->save();

            // Add items
            $invoice->addItem($produits->nom, $produits->prix_standard, $store->qte);

            // $items [] = Collection::make([
            //     'name'       => $produits->libelle,
            //     'price'      => $produits->prix_standard,
            //     'ammount'    => $nombre,
            // ]);
        }
        }
        // $clt = DB::table('clients','clients.id','=',$client_id)->first();
        $clt = Clients::find($client_id);
        $recettes = new Recette();
        $recettes->libelle = 'Vente du client '.$clt->nom.'';
        $recettes->date = date("Y-m-d");
        $recettes->montant=$total;
        $recettes->typerecette_id = 1;
        $recettes->save();

        // On va se servir de cela pour la configuration de produit
        /*
        * Il respecte le format (name, price amount, id)
        * Possibilité d'ajouter plusieurs produits
        */
        $invoice->with_pagination(true)
            ->duplicate_header(true)
            ->due_date(Carbon::now()->addMonths(1))
            ->customer([
                'name'      => $clt->nom,
                'phone'     => $clt->ntelephone,
                'zip'       => $clt->email
            ])
            ->business([
                'name'      => 'GesFabrik',
                'id'        => '',
                'phone'     => '',
                'location'  => 'Lomé',
                'zip'       => '',
                'country'   => 'Togo'
            ])
            ->name("Facture")
            ->currency("XOF"); // Forgot the currency definition


        $facture = new Facture();
        $facture->client_id = $clt->id;
        $facture->montant_ht = $total;
        $facture->montant_reste = $total;
        $facture->save();
        $facture->fichier = 'factures/'. $facture->id.'.pdf'; // this line seems useless but you have to update it
        $facture->save();

        $invoice->number($facture->id)
            ->save('public/factures/'. $facture->id.'.pdf'); // Specifying the right path and saving the file

        return redirect()->away('storage/factures/'. $facture->id.'.pdf');
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
    public function update(Request $request, $id)
    {
        //
        $clientproduit = ClientProduit::FindOrFail($id);

        $clientproduit->client_id = Request('client_id');
        $clientproduit->produit_id = Request('produit_id');
        $clientproduit->qte = Request('quantite');

        $clientproduit->save();

        return back()->with('success', 'Informations mise-à-jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientProduit  $clientProduit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        ClientProduit::destroy($id);

        return back()->with('success','vente supprimé avec succès');
    }
}
