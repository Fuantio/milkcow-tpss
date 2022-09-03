<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NovedadProduccionModel extends Model
{
    protected $table='novedad_produccion';

    public function produccion(){

        return $this->belongsTo('App\ProduccionModel', 'ID_Produccion','ID_Produccion');
    }

    public function usuarios(){

        return $this->belongsTo('App\User', 'id_usuario','id');
    }

    public function vacas(){

        return $this->belongsTo('App\vacaModel', 'id_vaca','Id_animal');
    }
}