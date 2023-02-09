<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employes extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['nom','prenom','sexe','age','adresse','type','role'];

    protected $table = 'employes';

    public function EmployeProduction()
    {
        return $this->belongsTo('App\EmployeProduction');
    }
}
