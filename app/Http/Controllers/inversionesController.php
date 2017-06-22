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
        
        $beneficiario = Beneficiario::where('canton_id',$request->canton)
        ->whereRAW("(tipoBono_id = 1 or tipoBono_id =2)")->get();



        $beneficiario->each(function($beneficiario){
            
            $beneficiario->bitacoraChildDiscapacitado;
            if(count($beneficiario->bitacoraChildDiscapacitado)>0){
                foreach ($beneficiario->bitacoraChildDiscapacitado as $value) {
                    $value->bono;    
                }                
            }

            $beneficiario->bitacoraChildEstudiante;
            if(count($beneficiario->bitacoraChildEstudiante)>0){
                foreach ($beneficiario->bitacoraChildEstudiante as $value) {
                    $value->bono;
                }
            }

            $beneficiario->bitacoraChildMenor;
            if(count($beneficiario->bitacoraChildMenor)>0){
                foreach ($beneficiario->bitacoraChildMenor as $value) {
                    $value->bono;
                }
            }

            $beneficiario->bitacoraChildEmbarazada;
            if(count($beneficiario->bitacoraChildEmbarazada)>0){
                foreach ($beneficiario->bitacoraChildEmbarazada as $value) {
                    $value->bono;
                }
            }
      
        });
        
        dd($beneficiario);
    }   


}
