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


class InversionPromotorController extends Controller
{

    public function index(){


    		try{
	        	$departamento = Departamento::all();
	 
    		}catch(\PDOException $ex ){
    			
          Flash::Danger("Se ha producido un error por favor verifique su conexion, o comuniquese con un tecnico");

        return redirect()->route('inversionPromotor');
    		}

         $departamento->each(function($departamento){
         	$departamento->municipio;
         	foreach ($departamento->municipio as $key => $value) {
         		$value->canton;
         	}
         	

         });

        // dd($departamento);
        return view('inversiones.inversionPromotor',compact('departamento'));
    }


    public function store(Request $request){
        $dineroPromotor=0;


        //dd($request->all());
        $fechaInicio = new DateTime($request->fechaInicio);
        $fechaFin = new DateTime($request->fechaFin);

        $dias = $fechaInicio->diff($fechaFin);

        $meses = round($dias->days/30);

        $beneficiario = Beneficiario::where('canton_id',$request->canton)
        ->whereRAW("(tipoBono_id = 1 or tipoBono_id =2 or tipoBono_id=3)")->get();

        $promotores=null;

try{


 
        foreach ($beneficiario as $bene) {
            
            $bene->bitacoraChildDiscapacitado;
            if(count($bene->bitacoraChildDiscapacitado)>0){
                foreach ($bene->bitacoraChildDiscapacitado as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;
                     $value->promotor = $value->promotores();  

                    
                }                
            }

            $bene->bitacoraChildEstudiante;
            if(count($bene->bitacoraChildEstudiante)>0){
                foreach ($bene->bitacoraChildEstudiante as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;
                    $value->promotor = $value->promotores();

                }
            }

            $bene->bitacoraChildMenor;
            if(count($bene->bitacoraChildMenor)>0){
                foreach ($bene->bitacoraChildMenor as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;
                    $value->promotor = $value->promotores();
                }
            }



                $bene->bitacoraEmbarazada;
                if(count($bene->bitacoraEmbarazada)>0){
                foreach ($bene->bitacoraEmbarazada as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;
                     $value->promotor = $value->promotores();
                }
            }

             $bene->bitacoraAdultoMayor;
            if(count($bene->bitacoraAdultoMayor)>0){
                foreach ($bene->bitacoraAdultoMayor as $value) {
                    $valor= $value->bono($request->fechaInicio,$request->fechaFin);
                    $value->bono = $valor;    
                     $value->promotor = $value->promotores();
                }                
            }

    }// fin del for

    }catch(\Illuminate\Database\QueryException $ex){
        Flash::Danger("Se ha producido un error por favor verifique su conexion, o comuniquese con un tecnico");

        return redirect()->route('inversionPromotor');
    }

    //dd($beneficiario);

        $BCD=0;
        $BCE=0;
        $BCM=0;
        $BE =0;
        $BAM=0;

        
        $i=0;
        


        foreach ($beneficiario as $bene) {
            
            if(count($bene->bitacoraChildDiscapacitado)>0){
                foreach ($bene->bitacoraChildDiscapacitado as $value) {
                    if(count($value->bono)>0 && $BCD<$meses && count($value->promotor)>0 ){
                        $promotores[$i] = $value->promotor[0];
                            $BCD = $BCD+1;
                                $i=$i+1;
                    }
                }                
            }

            if(count($bene->bitacoraChildEstudiante)>0){
                foreach ($bene->bitacoraChildEstudiante as $value) {
                    if(count($value->bono)>0 && $BCE<$meses && count($value->promotor)>0){
                        $promotores[$i] = $value->promotor[0];
                        $BCE = $BCE+1;
                                $i=$i+1;
                    }
                    
                }
            }


            if(count($bene->bitacoraChildMenor)>0){
                foreach ($bene->bitacoraChildMenor as $value) {
                    if(count($value->bono)>0 && $BCM<$meses && count($value->promotor)>0){
                        $promotores[$i] = $value->promotor[0];
                        $BCM = $BCM +1;
                                $i=$i+1;
                    }

                }
            }

           if(count($bene->bitacoraEmbarazada)>0){
                foreach ($bene->bitacoraEmbarazada as $value) {
                    if(count($value->bono)>0 && $BE < $meses && count($value->promotor)>0){
                        $promotores[$i] = $value->promotor[0];
                        $BE = $BE+1;
                                $i=$i+1;
                    }

                }
            }


            if(count($bene->bitacoraAdultoMayor)>0){
                foreach ($bene->bitacoraAdultoMayor as $value) {
                    if(count($value->bono)>0 && $BAM<$meses && count($value->promotor)>0){
					    $promotores[$i] = $value->promotor[0];                    	
                        $BAM = $BAM+1;
                         $i=$i+1;
						
                    }
                }                
            }          

        $BCD=0;
        $BCE=0;
        $BCM=0;
        $BE =0;
        $BAM=0;
        
    }// fin del for

    if(count($promotores)>0){
            for($i=0;$i<count($promotores)-1;$i++){
        for($j=0;$j<count($promotores)-1;$j++){
            if($promotores[$j]->id < $promotores[$j+1]->id){
                $aux = $promotores[$j+1];
                $promotores[$j+1] = $promotores[$j];
                $promotores[$j] = $aux;
            }
        }
    }

    $m=0;
    $id_p=0;
    for($i=0;$i<count($promotores);$i++){
        if($promotores[$i]->id != $id_p){
            $id_p = $promotores[$i]->id;
             $dineroPromotor = $dineroPromotor + $promotores[$i]->salario;
            
            }
        }
    }else{
          Flash::Danger("Se ha producido un error por favor verifique su conexion, o comuniquese con un tecnico");

        return redirect()->route('inversionPromotor');
    }
    

        

    //dd($dineroPromotor*$meses);
    
        $canton = Canton::where('id',$request->canton)->get();

 
        return view('inversiones.resultadoInversionPromotor')
        ->with('dineroPromotor',$dineroPromotor)
        ->with('fechaInicio',$request->fechaInicio)
        ->with('fechaFin',$request->fechaFin)
        ->with('canton',$canton);         
    
}


 public function crearPDF(Request $request){
        //dd($request->all());
        $view = \View::make('inversiones.reportePromotores')
        ->with('fechaInicio',$request->fechaInicio)
        ->with('fechaFin',$request->fechaFin)
        ->with('canton',$request->canton)
        ->with('dineroPromotor',$request->dineroPromotor)
        ->render();
     
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
     
        return $pdf->download("Reporte Inversion Promotores.pdf");
 }

}
