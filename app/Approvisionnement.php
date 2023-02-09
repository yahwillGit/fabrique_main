<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approvisionnement extends Model
{
    use SoftDeletes;

    protected $fillable = ['facture','quantite','prix_unitaire','prix_ttc','date','commentaire','fournisseur_id','intrant_id'];

    protected $table = 'approvisionnements';

    public function Intrants()
    {
        return $this->hasMany('App\Intrants');
    }

    public function Fournisseurs()
    {
        return $this->hasMany('App\Fournisseurs');
    }
}
