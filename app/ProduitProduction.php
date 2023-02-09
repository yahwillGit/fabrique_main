<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProduitProduction extends Model
{
    //

    use SoftDeletes;

    protected $fillable = ['produit_id','production_id','qte','qte_reel'];

    protected $table = 'produit_productions';


    public function Produition()
    {
        return $this->hasMany('App\Produition');
    }

    public function Produit()
    {
        return $this->hasMany('App\Produit');
    }
}
