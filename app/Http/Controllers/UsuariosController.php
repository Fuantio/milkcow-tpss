<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserModel;
use App\UsuariosModel;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    protected $table = 'Usuarios';

    public function index()
    {
        //$usuarios = User::all();

        //return view("paginas.usuarios",array("usuarios"=>$usuarios));

        return view("paginas.usuarios");
    }
    public function show($id)
    {

        $usuario = User::where("id", $id)->get();

        if (count($usuario) != 0) {
            return view("paginas.editarUsuario", array("usuario" => $usuario));
        } else {
            return view("paginas.editarUsuario", array("estatus" => 404));
        }
    }
    public function update($id, Request $request)
    {
        $datos = array(
            "name" => $request->input("name"),
            "identificacion" => $request->input("identificacion"),
            "gender" => $request->input("gender"),
            "email" => $request->input("email"),
            "celphone" => $request->input("celphone"),
            "type_user" => $request->input("type_user")
        );
        if (!empty($datos)) {
            $usuarios = User::where('id', $id)->update($datos);
            return redirect("/usuarios");
        }
    }

    public function destroy($id, Request $Request)
    {

        return $eliminarUsuario = User::where("id", $id)->delete();
    }
    public function store(Request $request)
    {

        $datos = array(
            "name" => $request->input("name"),
            "identificacion" => $request->input("identificacion"),
            "last_name" => $request->input("last_name"),
            "gender" => $request->input("gender"),
            "email" => $request->input("email"),
            "celphone" => $request->input("celphone"),
            "type_user" => $request->input("type_user"),
            "password" =>  Hash::make($request->input("password"))
        );
        if (!empty($datos)) {
            $usuarios = User::insert($datos);
            return redirect("/usuarios");
        }
    }


    public function buscarUsuario($textoUsuario, Request $request)
    {
        //if($request->ajax()){
        if ($textoUsuario === '-') {
            $usuarios = User::all();
            return $usuarios;
        } else {
            $usuarios = User::where('identificacion', 'like', '%' . $textoUsuario . '%')
                ->orWhere('name', 'like', '%' . $textoUsuario . '%')
                ->orWhere('last_name', 'like', '%' . $textoUsuario . '%')
                ->get();

            return $usuarios;
        }

        // PASO 6: Calcular cantidad de botones en app.js


    }
    public function contarUsuarios() 
    { 

        $cantidadUsuarios = UsuariosModel::count();

        return $cantidadUsuarios;
        //calcular cantidad de botones en app.js
    }
}
