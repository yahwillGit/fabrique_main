<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fournisseurs extends Model
{
    //

    use SoftDeletes;

    protected $fillable = ['nom','adresse','telephone','email'];

    protected $table = 'fournisseurs';

    public function Approvisionnement()
    {
        return $this->belongsTo('App\Approvisionnement');
    }
}
