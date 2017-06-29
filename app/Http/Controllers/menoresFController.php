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

    public function store(Request $request){
        $dineroChildDiscapacitados=0;
        $dineroChildEstudiante=0;
        $dineroChildMenor=0;
        $dineroEmbarazada=0;

        //dd($request->all());
        $fechaInicio = new DateTime($request->fechaInicio);
        $fechaFin = new DateTime($request->fechaFin);

        $dias = $fechaInicio->diff($fechaFin);

        $meses = round($dias->days/30);

        $beneficiario = Beneficiario::where('canton_id',$request->canton)
        ->whereRAW("(tipoBono_id = 1 or tipoBono_id =2)")->get();


 
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
        $BCD=0;
        $BCE=0;
        $BCM=0;
        $BE =0;

        foreach ($beneficiario as $bene) {
            
            if(count($bene->bitacoraChildDiscapacitado)>0){
                foreach ($bene->bitacoraChildDiscapacitado as $value) {
                    if(count($value->bono)>0 && $BCD<$meses){
                        $dineroChildDiscapacitados= $dineroChildDiscapacitados + $value->dineroInvertido;
                        $BCD = $BCD+1;
                    }
                }                
            }

            if(count($bene->bitacoraChildEstudiante)>0){
                foreach ($bene->bitacoraChildEstudiante as $value) {
                    if(count($value->bono)>0 && $BCE<$meses){
                        $dineroChildEstudiante=$dineroChildEstudiante+ $value->dineroInvertido;
                        $BCE = $BCE+1;
                    }
                    
                }
            }


            if(count($bene->bitacoraChildMenor)>0){
                foreach ($bene->bitacoraChildMenor as $value) {
                    if(count($value->bono)>0 && $BCM<$meses){
                        $dineroChildMenor = $dineroChildMenor + $value->dineroInvertido;
                        $BCM = $BCM +1;
                    }

                }
            }

           if(count($bene->bitacoraEmbarazada)>0){
                foreach ($bene->bitacoraEmbarazada as $value) {
                    if(count($value->bono)>0 && $BE < $meses){
                        $dineroEmbarazada=$dineroEmbarazada+ $value->dineroInvertido;
                        $BE = $BE+1;
                    }

                }
            }

        $BCD=0;
        $BCE=0;
        $BCM=0;
        $BE =0;

    }// fin del for

        $canton = Canton::where('id',$request->canton)->get();

 /*Nombre de la carpeta */
 
        return view('menoresF.resultadomenoresFallecidos')->with('dineroChildMenor',$dineroChildMenor)
        ->with('dineroChildEstudiante',$dineroChildEstudiante)
        ->with('dineroChildDiscapacitados',$dineroChildDiscapacitados)
        ->with('dineroEmbarazada',$dineroEmbarazada)
        ->with('fechaInicio',$request->fechaInicio)
        ->with('fechaFin',$request->fechaFin)
        ->with('canton',$canton);  


    }   



    public function show(){


    }


}