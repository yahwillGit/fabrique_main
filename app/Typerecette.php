<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Typerecette extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['libelle'];

    protected $table = 'typerecettes';

    public function Recette()
    {
        return $this->hasMany('App\Recette');
    }
}
