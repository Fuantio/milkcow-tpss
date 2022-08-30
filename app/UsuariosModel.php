<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{

    protected $table = 'Users';
    //
    public function Usuarios()
    {
        return $this->belongsTo('App\UsuariosModel', 'id');
    }
}
