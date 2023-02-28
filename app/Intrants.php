<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intrants extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['nom','unite','quantite_totale','quantite_seuil','prix_standard'];

    protected $table = 'intrants';

    public function Approvisionnement()
    {
        return $this->belongsTo('App\Approvisionnement');
    }

    public function IntrantProduit()
    {
        return $this->hasMany('App\IntrantProduit');
    }

    public function IntrantProduition()
    {
        return $this->belongsTo('App\IntrantProduit');
    }

}
