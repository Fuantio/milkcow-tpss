<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacaModel extends Model
{
    protected $table ='vaca'; 

    public function rebano(){
        return $this->belongsTo('App\RebanoModel', 'id_rebano', 'id_Rebano');

    }
   
    public function raza(){
        return $this->belongsTo('App\RazaModel', 'id_raza', 'id_raza');
    }
}
