<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\despachosModel;
use App\DestinoModel;
use App\inventarioLecheModel;
use App\User;

class despachosController extends Controller
{
    public function index()
    {
        /* 
        $despachos = despachosModel::all();

        return view("paginas.despachos", array("despachos" => $despachos));
        */
        return view("paginas.despachos");
    }
    public function show($id_despacho)
    {

        $destinos = DestinoModel::all();

        $usuarios = User::all();

        $despachos = despachosModel::where("id_despacho", $id_despacho)->get();


        if (count($despachos) != 0) {

            return view("paginas.editarDespachos", array("despachos" => $despachos, "destinos" => $destinos, "usuarios" => $usuarios));
        } else {

            return view("paginas.editarDespachos", array("estatus" => 404));
        }
    }
    public function update($id_despacho, Request $request)
    {


        $datos = array(

            "id_despacho" => $request->input("id_despacho"),
            "id_destino" => $request->input("id_destino"),
            "cantidad" => $request->input("cantidad"),
            "fecha" => $request->input("fecha"),
            "id_responsable" => $request->input("id_responsable")
        );
        if (!empty($datos)) {

            $despachos = despachosModel::where('id_despacho', $id_despacho)->update($datos);

            return redirect("/despachos");
        };
    }
    public function destroy($id_despacho, Request $request)
    {

        return $despachos = despachosModel::where("id_despacho", $id_despacho)->delete();
    }
    public function nuevoDespacho()
    {


        $destinos = DestinoModel::all();
        $responsables = User::all();
        return view("paginas.despachoAgregar", array("destinos" => $destinos, "responsables" => $responsables));
    }

    public function store(Request $request)
    {

        //consultar la cantidad de el ultimo registro en la tabla inventario leche 
        //si esa cantidad es menor a la cantidad que estan solicitando no realiza el insert
        //de lo contrario se realiza el insert y se crea un nuevo registro en la tabla inventario leche con la cantidad restante
        $inventarioLeche = inventarioLecheModel::latest('id_leche')->first();

        $cantidadActual = $inventarioLeche['existencias'];
        
        $cantidadRetiro = $request->input('cantidad');

        if ($cantidadActual < $cantidadRetiro){

            return redirect('/despachoAgregar');
        }else{

            $datos = array(

                "id_destino" => $request->input("id_destino"),
                "cantidad" => $request->input("cantidad"),
                "fecha" => $request->input("fecha"),
                "id_responsable" => $request->input("id_responsable"),
                "id_leche" => $inventarioLeche["id_leche"]
            );
            if (!empty($datos)) {
    
                $id_despachos = despachosModel::insertGetId($datos);

                $nuevaCantidad = $cantidadActual - $cantidadRetiro;

                $datosInventario = array(

                    "existencias" =>$nuevaCantidad,
                    "movimiento" => "salida",
                    "id_despachos" => $id_despachos
                );

                $inventarioLeche = inventarioLecheModel::insert($datosInventario);
               
                return redirect("/despachos");
            }
        }

     
    }

    public function buscarDespacho($textoDespachos, Request $request)
    {


        if ($textoDespachos === '-') {

            $despachos = despachosModel::join('destinos', 'despachos.id_destino', '=', 'destinos.id_destino')
                ->join('users', 'despachos.id_responsable', '=', 'users.id')
                ->orderBy('despachos.id_despacho', 'desc')
                ->get();

            return $despachos;
        } else {

            $despachos = despachosModel::where('destinos.destino', 'like', '%' . $textoDespachos . '%')
                ->join('destinos', 'despachos.id_destino', '=', 'destinos.id_destino')
                ->join('users', 'despachos.id_responsable', '=', 'users.id')
                ->orderBy('despachos.id_responsable', 'desc')
                ->get();

            return $despachos;
        }

    }

    public function buscarDespachoFecha($fechaDespachos, Request $request){

        if ($fechaDespachos === '-') {

            $despachos = despachosModel::join('destinos', 'despachos.id_destino', '=', 'destinos.id_destino')
                ->join('users', 'despachos.id_responsable', '=', 'users.id')
                ->orderBy('despachos.id_despacho', 'desc')
                ->get();

            return $despachos;
            
        }else{

            $despachos = despachosModel::where('despachos.fecha', '=', $fechaDespachos)
                ->join('destinos', 'despachos.id_destino', '=', 'destinos.id_destino')
                ->join('users', 'despachos.id_responsable', '=', 'users.id')
                ->orderBy('despachos.id_despacho', 'desc')
                ->get();

            return $despachos;

        }
    }
    public function contarDespachos(){

        $cantidadDespachos = despachosModel::count();

        return $cantidadDespachos;
    }
}
