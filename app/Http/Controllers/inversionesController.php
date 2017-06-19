<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Departamento;
use App\Canton;
use App\Municipio;

class inversionesController extends Controller
{
    
    public function index(){


    		try{
	        	$departamento = Departamento::all();
	 
    		}catch(\PDOException $ex ){
    			
    			Flash::Danger("Error en la conexion");
    			return view('inversiones.inversionSalud');
    		}

         $departamento->each(function($departamento){
         	$departamento->municipio;
         	foreach ($departamento->municipio as $key => $value) {
         		$value->canton;
         	}
         	

         });

        // dd($departamento);
        return view('inversiones.inversionSalud',compact('departamento'));
    }

    public function municipioInversiones(Request $request,$id){

    	if($request->ajax()){
    		$municipio = Municipio::municipios($id);
    		return response()->json($municipio);
    	}
    }

    public function cantonInversiones(Request $request,$id){

        if($request->ajax()){
            $canton = Canton::cantones($id);
            return response()->json($canton);
        }
    }

    public function store(Request $request){
        
        
        dd($request->all());
    }   


}
