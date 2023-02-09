<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Production extends Model
{
    //
	use SoftDeletes;

    protected $fillable = ['date_production'];

    protected $table = 'productions';

    public function IntrantProduition()
    {
        return $this->belongsTo('App\IntrantProduit');
    }

    public function ProduitProduction()
    {
        return $this->belongsTo('App\ProduitProduction');
    }
}
