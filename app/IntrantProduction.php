<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntrantProduction extends Model
{
    //

    use SoftDeletes; 

    protected $fillable = ['intrant_id','production_id','qte'];

    protected $table = 'intrant_productions';


    public function Production()
    {
        return $this->belongsTo('App\Production');
    }

    public function Intrant()
    {
        return $this->hasMany('App\Intrant');
    }
}
