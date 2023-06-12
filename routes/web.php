<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Carbon\Carbon;
use ConsoleTVs\Invoices\Classes\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Hash;

Route::get('ecran',function (){
    $fichier=\Illuminate\Support\Facades\Input::get('fichier');
    $val=\Illuminate\Support\Facades\Input::get('val');
    $param=\Illuminate\Support\Facades\Input::get('param');
    return view($fichier ,array('val'=>$val,'param'=>$param));
});

Route::resource('fournisseurs','FournisseursController');

Route::resource('clients','ClientsController');

Route::resource('employes','EmployesController');

Route::resource('intrants','IntrantsController');

Route::resource('approvisionnements','ApprovisionnementController');

Route::resource('produits','ProduitsController');

Route::resource('productions','ProductionController');

Route::post('productions_post','ProductionController@store')->name('productions_post');

Route::get('productions_list','ProductionController@liste')->name('productions_liste');

Route::resource('intrantproduits','IntrantProduitController');

Route::resource('produitproductions','ProduitProductionController');

Route::resource('ventes','ClientProduitController');

Route::resource('factures','FactureController');

Route::resource('typedepenses','TypedepenseController');

Route::resource('depenses','DepenseController');

Route::resource('validations','ValidationController');

Route::resource('typerecettes','TyperecetteController');

Route::resource('recettes','RecetteController');

Route::resource('reglements','ReglementController');

Route::post('vente_post','ClientProduitController@store')->name('vente_post');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('facture/ristourne','FactureController@ristourne')->name('facture.ristourne');

Route::get('valider/{id}','ValidationController@valider')->name('depenses.valider');

Route::post('etats/clients','EtatController@clients')->name('etats.clients');

Route::post('etats/commandes','EtatController@commandes')->name('etats.commandes');

Route::get('test',function (){
    $invoice = \ConsoleTVs\Invoices\Classes\Invoice::make()
        ->addItem('Test Item', 10.25, 2, 1412)
        ->addItem('Test Item 2', 5, 2, 923)
        ->addItem('Test Item 3', 15.55, 5, 42)
        ->addItem('Test Item 4', 1.25, 1, 923)
        ->addItem('Test Item 5', 3.12, 1, 3142)
        ->addItem('Test Item 6', 6.41, 3, 452)
        ->addItem('Test Item 7', 2.86, 1, 1526)
        ->addItem('Test Item 8', 5, 2, 923, 'https://dummyimage.com/64x64/000/fff')
        ->number(4021)
        ->with_pagination(true)
        ->duplicate_header(true)
        ->due_date(Carbon::now()->addMonths(1))
        ->notes('Lrem ipsum dolor sit amet, consectetur adipiscing elit.')
        ->customer([
            'name'      => 'Èrik Campobadal Forés',
            'id'        => '12345678A',
            'phone'     => '+34 123 456 789',
            'location'  => 'C / Unknown Street 1st',
            'zip'       => '08241',
            'city'      => 'Manresa',
            'country'   => 'Spain',
        ])
        ->download('demo')
        //or save it somewhere
        ->save('public/myinvoicename.pdf');
});

Route::get('tmp', function() {
    return User::create([
        'name' => 'yahwill',
        'email' => 'hognony@gmail.com',
        'password' => Hash::make('1221'),
    ]);
});
Route::get("/hash-password", fn() => Hash::make("password"));
