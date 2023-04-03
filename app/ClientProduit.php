<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientProduit extends Model
{
    //

    use SoftDeletes;

    protected $fillable = ['qte','date_vente','produit_id','client_id'];

    protected $dates = ['date_vente']; // That's for the date formating

    protected $table = 'client_produits';

    public function Client()
    {
        return $this->belongsTo('App\Clients'); // Here it's "App\Clients" and it's belongsTo not HasMany ; same for Produit
    }

    public function Produit()
    {
        return $this->belongsTo('App\Produits');
    }

}
