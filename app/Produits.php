<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produits extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['nom','description','prix_standard','qte_stock','qte_seuil'];

    protected $table = 'produits';

    public function IntrantProduit()
    {
        return $this->belongsTo('App\IntrantProduit');
    }

    public function ProduitProduction()
    {
        return $this->belongsTo('App\ProduitProduction');
    }

    public function ProduitVente()
    {
        return $this->belongsTo('App\ProduitVente');
    }

    public function ClientProduit()
    {
        return $this->belongsTo('App\ClientProduit');
    }
}
