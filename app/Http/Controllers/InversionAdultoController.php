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

class InversionAdultoController extends Controller
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
        return view('inversiones.inversionAdulto',compact('departamento'));
    }

public function store(Request $request){
        $dineroAdultoMayor=0;


        //dd($request->all());
        $fechaInicio = new DateTime($request->fechaInicio);
        $fechaFin = new DateTime($request->fechaFin);

        $dias = $fechaInicio->diff($fechaFin);

        $meses = round($dias->days/30);

        $beneficiario = Beneficiario::where('canton_id',$request->canton)
        ->whereRAW("(tipoBono_id = 3)")->get();


 
        foreach ($beneficiario as $bene) {
        try{
            $bene->bitacoraAdultoMayor;
            if(count($bene->bitacoraAdultoMayor)>0){
                foreach ($bene->bitacoraAdultoMayor as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;    
                }                
            }         

            } catch(\Illuminate\Database\QueryException $ex){
                dd($ex);
            }
            

    }// fin del for
        $BAM=0;
        

        foreach ($beneficiario as $bene) {
            
            if(count($bene->bitacoraAdultoMayor)>0){
                foreach ($bene->bitacoraAdultoMayor as $value) {
                    if(count($value->bono)>0 && $BAM<$meses){
						foreach($value->bono as $dinero){
                        	$dineroAdultoMayor= $dineroAdultoMayor + $dinero->dineroAcumulado;
                        	$BAM = $BAM+1;
						}
                    }
                }                
            }

           
        $BAM=0;


    }// fin del for

        $canton = Canton::where('id',$request->canton)->get();

 
        return view('inversiones.resultadoInversionAdulto')
        ->with('dineroAdultoMayor',$dineroAdultoMayor)
        ->with('fechaInicio',$request->fechaInicio)
        ->with('fechaFin',$request->fechaFin)
        ->with('canton',$canton);  


    }   
	


    
        
}
