<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Typerecette;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recette extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['libelle','date','montant','typerecette_id'];

    protected $table = 'recettes';

    public function Typerecette()
    {
        return $this->belongsTo('App\Typerecette');    }
}
