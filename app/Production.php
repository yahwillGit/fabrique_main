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

    public function IntrantProduction()
    {
        return $this->hasMany('App\IntrantProduction');
    }

    public function ProduitProduction()
    {
        return $this->hasMany('App\ProduitProduction');
    }

}
