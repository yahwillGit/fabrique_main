<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Typedepense extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['libelle'];

    protected $table = 'typedepenses';

    public function Depense()
    {
        return $this->hasMany('App\Depense');
    }
}
