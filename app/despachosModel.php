<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class despachosModel extends Model
{
    protected $table='despachos';

    /*public function produccion(){

        return $this->belongsTo('App\produccionModel','id_prod','id_produccion');
    }*/

    public function destino(){

        return $this->belongsTo('App\DestinoModel', 'id_destino','id_destino');
    }

    public function usuarios(){

        return $this->belongsTo('App\User','id_responsable','id');
    }

    /*public function vacas(){

        return $this->belongsTo('App\vacaModel','id_vaca','Id_animal');
    }*/
}
