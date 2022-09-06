<?php

namespace App\Http\Controllers;

use App\ProduccionModel;
use App\NovedadProduccionModel;
use App\User;
use App\vacaModel;
use Illuminate\Http\Request;

class NovedadProduccionController extends Controller
{
    public function index()
    {

        //$novedadesProduccion = NovedadProduccionModel::all();

        //return view("paginas.novedadesProduccion", array("novedadProduccion" => $novedadesProduccion));

        return view("paginas.novedadesProduccion");
    }

    public function show($id_novedad_produccion)
    {
        $usuarios = User::all();
        
       

        $novedadesProduccion = NovedadProduccionModel::where("id_novedad_produccion", $id_novedad_produccion)->get();

        $fechaProduccion = $novedadesProduccion[0]['fecha'];

        $producciones = ProduccionModel::where("fecha", $fechaProduccion)
        ->join('vaca', 'vaca.Id_animal', '=', 'producción.vaca')
        ->get();



        if (count($novedadesProduccion) != 0) {

            return view("paginas.editarNovedadesProduccion", array("novedadesProduccion" => $novedadesProduccion, "usuarios" => $usuarios, "producciones"=> $producciones));
        } else {

            return view("paginas.editarNovedadesProduccion", array("estatus" => 404));
        }
    }

    public function nuevaNovedad()
    {


        //cargar los datos d las producciones y cargar los datos de los usuarios para enviarlos en un areeglo a la vista (formulario para agregar)

        //$producciones = ProduccionModel::join('vaca','producción.vaca', '=', 'vaca.Id_animal')->get();

        $novedadesProduccion = NovedadProduccionModel::all();

        $responsables = User::all();

        $vacas = vacaModel::all();

        return view("paginas.novedadProduccionAgregar", array("responsables" => $responsables, "novedadesProduccion" => $novedadesProduccion, "vacas" => $vacas));
    }

    public function store(Request $request)
    {



        $datos = array(


            "id_usuario" => $request->input("id_usuario"),
            "ID_Produccion" => $request->input("ID_Produccion"),
            "fecha" => $request->input("fecha"),
            "observaciones" => $request->input("observaciones")


        );
        if (!empty($datos)) {


            $novedadesProduccion = NovedadProduccionModel::insert($datos);

            return redirect("/novedadesProduccion");
        };
    }

    public function update($id_novedad_produccion, Request $request)
    {

        $datos = array(

            "ID_Produccion" => $request->input("ID_Produccion"),
            "id_usuario" => $request->input("id_usuario"),
            "observaciones" => $request->input("observaciones")

        );

        if (!empty($datos)) {


            $novedadesProduccion = NovedadProduccionModel::where('id_novedad_produccion', $id_novedad_produccion)->update($datos);

            return redirect("/novedadesProduccion");
        }
    }

    public function destroy($id_novedad_produccion, Request $request)
    {


        return $novedadesProduccion = NovedadProduccionModel::where('id_novedad_produccion', $id_novedad_produccion)->delete();
    }

    public function buscarParaNovedad($fecha, Request $request)
    {

        if ($fecha != '') {

            $producciones = ProduccionModel::where('producción.fecha', '=', $fecha)
                ->join('vaca', 'producción.vaca', '=', 'vaca.Id_animal')
                ->join('users', 'producción.responsable', '=', 'users.id')
                ->get();

            return $producciones;
        }
    }

    public function buscarNovedades($fecha)
    {

        //$novedadesProduccion = NovedadProduccionModel::all();

        //return $novedadesProduccion;

        if ($fecha === '-') {

            $novedadesProduccion = NovedadProduccionModel::join('producción', 'novedad_produccion.ID_Produccion', '=', 'producción.ID_Produccion')
                ->join('vaca', 'producción.vaca', '=', 'vaca.Id_animal')
                ->join('users', 'novedad_produccion.id_usuario', '=', 'users.id')
                ->orderBy('novedad_produccion.id_novedad_produccion', 'desc')
                ->get();

            return $novedadesProduccion;
        } else {

            $novedadesProduccion = NovedadProduccionModel::where('producción.fecha', 'like', '%' . $fecha . '%')

                ->join('producción', 'novedad_produccion.ID_Produccion', '=', 'producción.ID_Produccion')
                ->join('vaca', 'producción.vaca', '=', 'vaca.Id_animal')
                ->join('users', 'novedad_produccion.id_usuario', '=', 'users.id')
                ->orderBy('novedad_produccion.id_novedad_produccion', 'desc')
                ->get();
            return $novedadesProduccion;
        }
    }
    public function contarNovedadesProduccion()
    {

        $cantidadNovedadesProduccion = NovedadProduccionModel::count();

        return $cantidadNovedadesProduccion;
    }
}
