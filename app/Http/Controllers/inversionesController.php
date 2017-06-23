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
        $dineroChildDiscapacitados=0;
        $dineroChildEstudiante=0;
        $dineroChildMenor=0;
        $dineroEmbarazada=0;

        //dd($request->all());
        
        $beneficiario = Beneficiario::where('canton_id',$request->canton)
        ->whereRAW("(tipoBono_id = 1 or tipoBono_id =2)")->get();


        $i=0;
        foreach ($beneficiario as $bene) {
            
            $bene->bitacoraChildDiscapacitado;
            if(count($bene->bitacoraChildDiscapacitado)>0){
                foreach ($bene->bitacoraChildDiscapacitado as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;    
                }                
            }

            $bene->bitacoraChildEstudiante;
            if(count($bene->bitacoraChildEstudiante)>0){
                foreach ($bene->bitacoraChildEstudiante as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;

                    
                }
            }

            $bene->bitacoraChildMenor;
            if(count($bene->bitacoraChildMenor)>0){
                foreach ($bene->bitacoraChildMenor as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;
                }
            }


            try{
                $bene->bitacoraEmbarazada;
                if(count($bene->bitacoraEmbarazada)>0){
                foreach ($bene->bitacoraEmbarazada as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;
                }
            }

            } catch(\Illuminate\Database\QueryException $ex){
                dd($ex);
            }
            

    }// fin del for

        foreach ($beneficiario as $bene) {
            
            if(count($bene->bitacoraChildDiscapacitado)>0){
                foreach ($bene->bitacoraChildDiscapacitado as $value) {
                    if(count($value->bono)){
                               
        
                        $dineroChildDiscapacitados= $dineroChildDiscapacitados + $value->dineroInvertido;
                    }
                }                
            }

            if(count($bene->bitacoraChildEstudiante)>0){
                foreach ($bene->bitacoraChildEstudiante as $value) {
                    if(count($value->bono)){
                        $dineroChildEstudiante=$dineroChildEstudiante+ $value->dineroInvertido;
        
                    }
                    
                }
            }

            if(count($bene->bitacoraChildMenor)>0){
                foreach ($bene->bitacoraChildMenor as $value) {
                    if(count($value->bono)){
                        $dineroChildMenor = $dineroChildMenor + $value->dineroInvertido;
                        
                    }

                }
            }

           if(count($bene->bitacoraEmbarazada)>0){
                foreach ($bene->bitacoraEmbarazada as $value) {
                    if(count($value->bono)){
                        $dineroEmbarazada=$dineroEmbarazada+ $value->dineroInvertido;
                    }

                }
            }

    }// fin del for


      
        return view('inversiones.resultadoInversionSalud')->with('dineroChildMenor',$dineroChildMenor);  


    }   


    public function show(){


    }


}
