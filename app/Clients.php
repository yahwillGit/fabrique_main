<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clients extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['nom','adresse','telephone','email'];

    protected $table = 'clients';

    public function ClientProduit()
    {
        return $this->belongsTo('App\ClientProduit');
    }

    public function factures(){
        return $this->hasMany('App\Facture','client_id');
    }
}
