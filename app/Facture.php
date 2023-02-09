<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $guarded = ['id'];

    public function client(){
        return $this->belongsTo(Clients::class,'client_id');
    }

    public function reglements(){
        return $this->hasMany(Reglement::class,'facture');
    }
}
