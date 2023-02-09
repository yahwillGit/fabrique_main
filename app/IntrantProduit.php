<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntrantProduit extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['quantite_intrant','quantite_produit','produit_id','intrant_id'];

    protected $table = 'intrant_produits';

    public function Intrant()
    {
        return $this->hasMany('App\Intrant');
    }

    public function Produit()
    {
        return $this->hasMany('App\Produit');
    }
}
