<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeProduction extends Model
{
    //

    use SoftDeletes;

    protected $fillable = ['employe_id','production_id'];

    protected $table = 'employe_productions';


    public function Produition()
    {
        return $this->hasMany('App\Produition');
    }

    public function Employe()
    {
        return $this->hasMany('App\Employe');
    }
}
