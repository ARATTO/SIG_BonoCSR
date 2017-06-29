<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Departamento;
use App\Canton;
use App\Municipio;
use App\Bono;
use App\Beneficiario;
use DateTime;

class MenoresFController extends Controller
{
    
    public function index(){


    		try{
	        	$departamento = Departamento::all();
	 
    		}catch(\PDOException $ex ){
    			
    			Flash::Danger("Error en la conexion");
    			return view('menores.menoresFallecidos'); /*Nombre la carpeta
                 que tienen las vistas la vista es MenoresFallecidos.php*/
    		}

         $departamento->each(function($departamento){
         	$departamento->municipio;
         	foreach ($departamento->municipio as $key => $value) {
         		$value->canton;
         	}
         	

         });

        // dd($departamento);
        return view('menoresF.menoresFallecidos',compact('departamento'));/*Nombre la carpeta
                 que tienen las vistas la vista es MenoresFallecidos.php y hace referencia con el depart*/
    }

    public function municipioMenoresF(Request $request,$id){/*Se le envia el municipio*/

    	if($request->ajax()){
    		$municipio = Municipio::municipios($id);
    		return response()->json($municipio);
    	}
    }

    public function cantonMenoresF(Request $request,$id){

        if($request->ajax()){
            $canton = Canton::cantones($id);
            return response()->json($canton);
        }
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $canton = Canton::where('id',$request->canton)->get();/*muestras el id del canton*/
        $municipio = Municipio::where ('id',$request->municipio)->get();
    
        $fechaInicio = new DateTime($request->fechaInicio);
        $fechaFin = new DateTime($request->fechaFin);

        $dias = $fechaInicio->diff($fechaFin);

        $meses = round($dias->days/30);

        
        
        $canton = Canton::where('id',$request->canton)->get();

        return view('menoresF.resultadomenoresFallecidos')
        ->with('fechaInicio',$request->fechaInicio)/*Pone la fecha inicio*/
        ->with('fechaFin',$request->fechaFin)/*pone la fecha fin*/
        ->with('municipio',$municipio)
        ->with('canton',$canton);

    }


  



    public function show(){


    }


}
