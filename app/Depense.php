<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depense extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['libelle','date','montant','typedepense_id'];

    protected $table = 'depenses';

    public function Typedepense()
    {
        return $this->belongsTo('App\Typedepense');
    }
}
