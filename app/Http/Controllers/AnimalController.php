<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\VacaModel;
use App\RebanoModel;
use App\RazaModel;

class AnimalController extends Controller
{
   public function index(){

    $animales = VacaModel::all();
    //debo realizar consulta con el belongTo para combinar la tabla vaca con la tabla raza
    return view("paginas.animales", array("animales"=>$animales));
   }

   public function show($Id_animal){

      $animales = VacaModel::where("Id_animal", $Id_animal)->get();

      $rebanos = RebanoModel::all();

      $razas = RazaModel::all();

      if (count($animales) != 0){

         return view("paginas.editarVaca", array("animales"=>$animales, "rebanos"=>$rebanos, "razas"=>$razas));
         
      }else{
         return view("paginas.editarVaca", array("estatus"=>404));
      }
   }
   public function update($Id_animal, Request $request){

      $datos = array(

         "nombre" => $request->input("nombre"),
         "placa" => $request->input("placa"),
         "fecha_de_nacimiento" => $request->input("fecha_de_nacimiento"),
         "estado" => $request->input("estado"),
         "id_raza" => $request->input("raza"),
         "id_rebano"=> $request->input("num_lote")

      );
      
      if(!empty($datos)){
         $animales = VacaModel::where('Id_animal', $Id_animal)->update($datos);

         return redirect("/animales");
      }

   }
   
   public function destroy($Id_animal, Request $request){

      return $animales = VacaModel::where("Id_animal", $Id_animal)->delete();
   }
   public function animalAgregar(){
      $rebanos=RebanoModel::all();
      $razas=RazaModel::all();

      return view("paginas.animalesAgregar", array("rebanos"=>$rebanos,"razas"=>$razas));


   }
   public function store(Request $request){

      $datos = array(
         "nombre"  => $request->input("nombre"),
         "placa" => $request->input("placa"),
         "fecha_de_nacimiento"  => $request->input("fecha_de_nacimiento"),
         "estado"  => $request->input("estado"),
         "id_raza"  => $request->input("id_raza"),
         "id_rebano"  => $request->input("id_rebano")
      );
      if (!empty($datos)){

         $animales = VacaModel::insert($datos);
         return redirect("/animales");
      }
   }
   public function buscarAnimales($nombre_vaca, Request $request){
      
      //if($request->ajax()){

         if($nombre_vaca === '-'){

            $animales = VacaModel::join('rebano', 'rebano.id_Rebano', '=', 'vaca.id_rebano')
            ->join('raza', 'raza.id_raza', '=', 'vaca.id_raza')
            ->get();
            return $animales;
         
      }else{
         $animales = VacaModel::where('nombre', 'like', '%' .$nombre_vaca.'%')
          ->join('rebano', 'rebano.id_Rebano', '=', 'vaca.id_rebano')
         ->join('raza', 'raza.id_raza', '=', 'vaca.id_raza')
         ->get();

         return $animales;

      //}
   }
  
}
public function contarAnimales(){

   $cantidadAnimales = VacaModel::count();
   return $cantidadAnimales;
}

}
