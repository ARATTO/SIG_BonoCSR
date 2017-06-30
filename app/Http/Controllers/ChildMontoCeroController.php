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
use Illuminate\Pagination\LengthAwarePaginator;

class ChildMontoCeroController extends Controller
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
        return view('ChildMenores.ChildMontoCero',compact('departamento'));
    }

    public function store(Request $request){
               //dd($request->all());
        $fechaInicio = new DateTime($request->fechaInicio);
        $fechaFin = new DateTime($request->fechaFin);

        $dias = $fechaInicio->diff($fechaFin);

        $meses = round($dias->days/30);

        try{

        $beneficiario = Beneficiario::where('canton_id',$request->canton)
        ->whereRAW("(tipoBono_id = 1 or tipoBono_id =2)")->paginate(10);


        foreach ($beneficiario as $bene) {
        
            $bene->titulares;
            
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

        }//fin del for each

        $kids=null;
        $i=0;
        $BCD=0;
        $BCE=0;
        $BCM=0;
    foreach ($beneficiario as $bene) {
            
            if(count($bene->bitacoraChildDiscapacitado)>0){
                foreach ($bene->bitacoraChildDiscapacitado as $value) {
                    if(count($value->bono)>0 && $BCD<$meses){
            			foreach($value->bono as $dinero){
                            if($dinero->Acumulado == 0){
                                $kids[$i] = $bene; 
                                $BCD = $BCD+1;
                                $i = $i+1;
                            }	
                        	
						}     
                    }
                    
                }                
            }

            if(count($bene->bitacoraChildEstudiante)>0){
                foreach ($bene->bitacoraChildEstudiante as $value) {
                   if($value->dineroInvertido == 0 && $BCE<$meses){
                       $kids[$i] = $bene;
                       $BCE = $BCE+1;
                       $i = $i+1;
                   }
                    
                }
            }


            if(count($bene->bitacoraChildMenor)>0){
                foreach ($bene->bitacoraChildMenor as $value) {//$BCM<$meses
                    if($value->dineroInvertido == 0 && $BCM<$meses){
                       $kids[$i] = $bene;
                       $BCM = $BCM+1;
                       $i = $i+1;
                   }
                }
            }


        $BCD=0;
        $BCE=0;
        $BCM=0;


    }// fin del for

    $kidsCero=null;;

       if(count($kids)>0){
            for($i=0;$i<count($kids)-1;$i++){
        for($j=0;$j<count($kids)-1;$j++){
            if($kids[$j]->id < $kids[$j+1]->id){
                $aux = $kids[$j+1];
                $kids[$j+1] = $kids[$j];
                $kids[$j] = $aux;
            }
        }
    }

    $k=0;
    $m=0;
    $id_p=0;
    for($i=0;$i<count($kids);$i++){
        if($kids[$i]->id != $id_p){
            $id_p = $kids[$i]->id;
            $kidsCero[$k] = $kids[$i];
            if(count ($kids[$i]->bitacoraChildDiscapacitado)>0){
                $kidsCero[$k]->bitacora = $kids[$i]->bitacoraChildDiscapacitado;

            }elseif(count($kids[$i]->bitacoraChildEstudiante)>0){
                $kidsCero[$k]->bitacora = $kids[$i]->bitacoraChildEstudiante;

            }elseif(count($kids[$i]->bitacoraChildMenor)>0){
                $kidsCero[$k]->bitacora = $kids[$i]->bitacoraChildMenor;
            }
            $k=$k+1;
            }
        
        }


        
       }else{
          Flash::Warning("No hay niños con monto cero");

        return redirect()->route('childMontoCero');
    }

    //dd($kidsCero);

        }catch(\Illuminate\Database\QueryException $ex){//fin del try
            			
          Flash::Danger("Se ha producido un error por favor verifique su conexion, o comuniquese con un tecnico");

            return redirect()->route('childMontoCero');
        }


            // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // Create a new Laravel collection from the array data
        $itemCollection = collect($kidsCero);
        // Define how many items we want to be visible in each page
        $perPage = 10;
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath($request->url());    


        

        $canton = Canton::where('id',$request->canton)->get();

        $canton->each(function($canton){
            $canton->municipios;
        });


 
        return view('ChildMenores.ResultadoChildMontoCero')
        ->with('kidsCero',$paginatedItems)
        ->with('fechaInicio',$request->fechaInicio)
        ->with('fechaFin',$request->fechaFin)
        ->with('canton',$canton);  

    }//final del store




     public function crearPDF(Request $request){

                $fechaInicio = new DateTime($request->fechaInicio);
        $fechaFin = new DateTime($request->fechaFin);

        $dias = $fechaInicio->diff($fechaFin);

        $meses = round($dias->days/30);

        try{

        $beneficiario = Beneficiario::where('canton_id',$request->canton)
        ->whereRAW("(tipoBono_id = 1 or tipoBono_id =2)")->paginate(10);


        foreach ($beneficiario as $bene) {
        
            $bene->titulares;
            
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

        }//fin del for each

        $kids=null;
        $i=0;
        $BCD=0;
        $BCE=0;
        $BCM=0;
    foreach ($beneficiario as $bene) {
            
            if(count($bene->bitacoraChildDiscapacitado)>0){
                foreach ($bene->bitacoraChildDiscapacitado as $value) {
                    if(count($value->bono)>0 && $BCD<$meses){
            			foreach($value->bono as $dinero){
                            if($dinero->Acumulado == 0){
                                $kids[$i] = $bene; 
                                $BCD = $BCD+1;
                                $i = $i+1;
                            }	
                        	
						}     
                    }
                    
                }                
            }

            if(count($bene->bitacoraChildEstudiante)>0){
                foreach ($bene->bitacoraChildEstudiante as $value) {
                   if($value->dineroInvertido == 0 && $BCE<$meses){
                       $kids[$i] = $bene;
                       $BCE = $BCE+1;
                       $i = $i+1;
                   }
                    
                }
            }


            if(count($bene->bitacoraChildMenor)>0){
                foreach ($bene->bitacoraChildMenor as $value) {//$BCM<$meses
                    if($value->dineroInvertido == 0 && $BCM<$meses){
                       $kids[$i] = $bene;
                       $BCM = $BCM+1;
                       $i = $i+1;
                   }
                }
            }


        $BCD=0;
        $BCE=0;
        $BCM=0;


    }// fin del for

    $kidsCero=null;;

       if(count($kids)>0){
            for($i=0;$i<count($kids)-1;$i++){
        for($j=0;$j<count($kids)-1;$j++){
            if($kids[$j]->id < $kids[$j+1]->id){
                $aux = $kids[$j+1];
                $kids[$j+1] = $kids[$j];
                $kids[$j] = $aux;
            }
        }
    }

    $k=0;
    $m=0;
    $id_p=0;
    for($i=0;$i<count($kids);$i++){
        if($kids[$i]->id != $id_p){
            $id_p = $kids[$i]->id;
            $kidsCero[$k] = $kids[$i];
            if(count ($kids[$i]->bitacoraChildDiscapacitado)>0){
                $kidsCero[$k]->bitacora = $kids[$i]->bitacoraChildDiscapacitado;

            }elseif(count($kids[$i]->bitacoraChildEstudiante)>0){
                $kidsCero[$k]->bitacora = $kids[$i]->bitacoraChildEstudiante;

            }elseif(count($kids[$i]->bitacoraChildMenor)>0){
                $kidsCero[$k]->bitacora = $kids[$i]->bitacoraChildMenor;
            }
            $k=$k+1;
            }
        
        }


        
       }else{
          Flash::Warning("No hay niños con monto cero");

        return redirect()->route('childMontoCero');
    }

    //dd($kidsCero);

        }catch(\Illuminate\Database\QueryException $ex){//fin del try
            			
          Flash::Danger("Se ha producido un error por favor verifique su conexion, o comuniquese con un tecnico");

            return redirect()->route('childMontoCero');
        }


            // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // Create a new Laravel collection from the array data
        $itemCollection = collect($kidsCero);
        // Define how many items we want to be visible in each page
        $perPage = 10;
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath($request->url());    


        

        $canton = Canton::where('id',$request->canton)->get();

        $canton->each(function($canton){
            $canton->municipios;
        });


        $view = \View::make('ChildMenores.reporteChildMontoCero')
        ->with('kidsCero',$paginatedItems)
        ->with('fechaInicio',$request->fechaInicio)
        ->with('fechaFin',$request->fechaFin)
        ->with('canton',$canton)  
        ->render();
     
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
     
        return $pdf->download("Reporte kids con bono cero.pdf");
 }







}
