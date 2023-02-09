<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientProduit extends Model
{
    //

    use SoftDeletes;

    protected $fillable = ['qte','date_vente','produit_id','client_id'];

    protected $table = 'client_produits';

    public function Client()
    {
        return $this->hasMany('App\Client');
    }

    public function Produit()
    {
        return $this->hasMany('App\Produit');
    }

}
