<?php

namespace App\Http\Controllers;

use App\ClientProduit;
use App\Clients;
use Illuminate\Http\Request;
use Jimmyjs\ReportGenerator\Facades\PdfReportFacade;

class EtatController extends Controller
{
    public function clients(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $sortBy = $request->input('sort_by');

        $title = 'Liste des clients'; // Report title

        $meta = [ // For displaying filters description on header
            'Du' => $fromDate . ' Au ' . $toDate,
        ];

        $queryBuilder = Clients::select(['nom', 'telephone', 'adresse'])
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->orderBy('created_at', $sortBy);

        $columns = [ // Set Column to be displayed
            'Nom' => 'nom',
            'Téléphone' => 'telephone', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            'Adresse' => 'adresse',
            'Valeur achats' => function (Clients $result) { // You can do if statement or any action do you want inside this closure
                $factures = $result->factures;
                $total = 0;
                foreach ($factures as $facture) {
                    $total += $facture->montant_ht;
                }
                return $total;
            }
        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReportFacade::of($title, $meta, $queryBuilder, $columns)
            ->simple()
            /*->editColumn('Date', [ // Change column class or manipulate its data for displaying to report
                'displayAs' => function($result) {
                    return $result->created_at->format('d M Y');
                },
                'class' => 'left'
            ])*/
            ->editColumns(['Valeur achats'], [ // Mass edit column
                'class' => 'right bold'
            ])
            ->showTotal([ // Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
                'Total' => 'FCFA' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
            ])
            ->limit(20)// Limit record to be showed
            ->stream();
    }

    public function commandes(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $sortBy = $request->input('sort_by');

        $title = 'Liste des clients'; // Report title

        $meta = [ // For displaying filters description on header
            'Du' => $fromDate . ' Au ' . $toDate,
        ];

        $queryBuilder = ClientProduit::join('clients','clients.id','=','client_produits.client_id')
            ->join('produits','produits.id','=','client_produits.produit_id')
            ->whereBetween('client_produits.created_at', [$fromDate, $toDate])
            ->select('client_produits.date_vente as date','client_produits.qte as quantite','clients.nom as nom','produits.nom as designation')
            ->orderBy('client_produits.created_at', $sortBy);

        $columns = [
            'Date' => 'date',
            'Client' => 'nom',
            'Produit' => 'designation',
            'Quantité' => 'quantite',
            'Echéance' => '',
            'Total livré' => '',
            'Reste' => '',
            'Destination' => '',
        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReportFacade::of($title, $meta, $queryBuilder, $columns)
            ->editColumn('Date', [
                'class' => 'left'
            ])
            ->stream();
    }
}
