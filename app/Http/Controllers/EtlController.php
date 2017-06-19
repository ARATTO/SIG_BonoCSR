<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;
use Excel;
use Laracasts\Flash\Flash;
use App\Beneficiario;
use App\BitacoraAdultoMayor;
use App\BitacoraChildDiscapacitado;
use App\BitacoraChildEstudiante;
use App\BitacoraChildMenor;
use App\BitacoraEmbarazada;
use App\Bono;
use App\Canton;
use App\CentroDeSalud;
use App\Departamento;
use App\Escuela;
use App\Municipio;
use App\ONG;
use App\Pais;
use App\Promotor;
use App\TipoBono;
use App\TipoEstado;
use App\Titular;
use App\User;

class EtlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('CargaDeDatos.cargarDatos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());


        $archivo = $request->file('archivo');
     
        $nombre_original=$archivo->getClientOriginalName();

        $extension=$archivo->getClientOriginalExtension();
        $r1=Storage::disk('local')->put($nombre_original, \File::get($archivo) );
        $ruta  =  storage_path('app') ."/". $nombre_original;


        if($r1){
            $ct=0;

            Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) {
                //dd($hoja);
                       //$f=1;
                $hoja->each(function($fila,$f) {
                   //echo " N° de fila: ".($f+2)."<br>";//.$fila;
                    $contador = 2;

                /*ANALIZANDO TABLA ONG*/
                    $ong = ONG::where('id',$fila->id_ong)->get();

                    if (count($ong)==0) {
                        try{
                            $ong = new ONG();
                            $ong->id = $fila->id_ong;
                            $ong->descripcion = $fila->descripcion_ong;
                            $ong->detalleDireccion = $fila->detalledireccion_ong;
                            $ong->mision = $fila->mision_ong;
                            $ong->vision =$fila->vision_ong;
                            $ong->save();


                            } catch(\Illuminate\Database\QueryException $ex){
                                
                                Flash::Danger("Ocurrio un error con la ong en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 

                        }

                    }

                /*ANALIZANDO TABLA ONG*/

                /*ANALIZANDO TABLA pais*/                

                    $pais = Pais::where('id',$fila->id_pais)->get();

                    foreach ($pais as $key) {
                        $pais = $key;
                    }


                    if(count($pais)==0){
                        try{
                            $pais = new Pais();
                            $pais->id = $fila->id_pais;
                            $pais->codigo = $fila->codigo_pais;
                            $pais->nombre = $fila->nombre_pais;
                            $pais->save();
                            } catch(\Illuminate\Database\QueryException $ex){
                                
                                Flash::Danger("Ocurrio un error con el pais en la fila: " .$contador. " por favor verifique dichos datos");
                           
                                return redirect()->route('etl');
                              exit; 
                        }                            
                    }

                /*ANALIZANDO TABLA pais*/    

                /*ANALIZANDO TABLA departamento*/
                    $departamento = Departamento::where('id', $fila->id_departamento)->get();


                    foreach ($departamento as $key) {
                        $departamento = $key;
                    }


                    if(count($departamento)==0){
                        try{
                            $departamento = new Departamento();
                            $departamento->id =   $fila->id_departamento;
                            $departamento->nombre=   $fila->nombre_departamento ;
                            $departamento->codigo=   $fila->codigo_departamento;
                            $departamento->pais_id = $fila->pais_id_departamento; 
                            $departamento->save();
                            


                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con el departamento en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }


                /*ANALIZANDO TABLA departamento*/
                /*ANALIZANDO TABLA municipio*/                
                    $municipio = Municipio::where('id', $fila->id_municipio)->get();


                    foreach ($municipio as $key) {
                        $municipio = $key;
                    }


                    if(count($municipio)==0){
                        try{
                            $municipio = new Municipio();

                            $municipio->id =$fila->id_municipio     ;
                            $municipio->codigo = $fila->codigo_municipio     ;
                            $municipio->nombre = $fila->nombre_municipio     ;
                            $municipio->departamento_id = $fila->departamento_id_municipio     ;                            
                            $municipio->save();
                            



                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con el municipio en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }

                /*ANALIZANDO TABLA municipio*/
                /*ANALIZANDO TABLA canton*/
                $canton = canton::where('id', $fila->id_canton)->get();


                    foreach ($canton as $key) {
                        $canton = $key;
                    }


                    if(count($canton)==0){
                        try{
                            $canton = new Canton();
                               $canton->id=$fila->id_canton    ;
                               $canton->codigo=$fila->codigo_canton    ;
                               $canton->nombre=$fila->nombre_canton    ;
                               $canton->esextremapobreza=$fila->esextremapobreza_canton ;
                               $canton->municipio_id = $fila->municipio_id_canton   ;
                                                         
                               $canton->save();

                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con el canton en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA canton*/

                /*ANALIZANDO TABLA titular*/
                $titular = Titular::where('id',$fila->id_titular)->get();


                    foreach ($titular as $key) {
                        $titular = $key;
                    }

                    if(count($titular)==0){
                        try{
                            $titular = new Titular();
                         $titular->id =  $fila->id_titular   ;
                         $titular->codigo=  $fila->codigo_titular   ;
                         $titular->nombre=  $fila->nombre_titular   ;
                         $titular->apellido=  $fila->apellido_titular     ;
                         $titular->dui=  $fila->dui_titular  ;
                         $titular->sabeleer=  $fila->sabeleer_titular     ;
                         $titular->sabeescribir=  $fila->sabeescribir_titular     ;
                         $titular->fechanacimiento=  $fila->fechanacimiento_titular->format('Y-m-d');  ;
                         $titular->genero= $fila->genero_titular    ;
                         $titular->save();                                                        


                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con el titular en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA titular*/ 


                /*ANALIZANDO TABLA tipoEstado*/
                $tipoEstado = TipoEstado::where('id',$fila->id_tipoestado )->get();


                    foreach ($tipoEstado as $key) {
                        $tipoEstado = $key;
                    }
               
                    if(count($tipoEstado)==0){
                        try{
                            $tipoEstado = new TipoEstado();
                            $tipoEstado->id  = $fila->id_tipoestado    ;
                            $tipoEstado->codigo =  $fila->codigo_tipoestado    ;
                            $tipoEstado->nombre =   $fila->nombre_tipoestado    ;
                            $tipoEstado->descripcion =   $fila->descripcion_tipoestado    ;
                                                                   
                           $tipoEstado->save();

                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con el tipo de estado en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA tipoEstado*/                                  

                /*ANALIZANDO TABLA tipoBono*/
                $tipoBono = TipoBono::where('id',$fila->id_tipobono )->get();


                    foreach ($tipoBono as $key) {
                        $tipoBono = $key;
                    }
               
                    if(count($tipoBono)==0){
                        try{
                            $tipoBono = new TipoBono;
                           $tipoBono->id = $fila->id_tipobono  ;
                           $tipoBono->codigo = $fila->codigo_tipobono  ;
                           $tipoBono->nombre =  $fila->nombre_tipobono  ;
                           $tipoBono->cantidad = $fila->cantidad_tipobono    ;
                           $tipoBono->descripcion = $fila->descripcion_tipobono      ;

                           $tipoBono->save();

                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con el tipo de bono en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA tipoBono*/ 
 
                 /*ANALIZANDO TABLA beneficiario*/
                $beneficiario = Beneficiario::where('id',$fila->id_beneficiario )->get();


                    foreach ($beneficiario as $key) {
                        $beneficiario = $key;
                    }

                    if(count($beneficiario)==0){
                        try{
                            $beneficiario = new Beneficiario();
                          $beneficiario->id = $fila->id_beneficiario  ;
                           $beneficiario->nombre = $fila->nombre_beneficiario  ;
                           $beneficiario->apellidos = $fila->apellidos_beneficiario   ;
                           $beneficiario->nombremadre = $fila->nombremadre_beneficiario     ;
                           $beneficiario->nombrepadre = $fila->nombrepadre_beneficiario     ;
                           $beneficiario->nombreencargado = $fila->nombreencargado_beneficiario     ;
                           $beneficiario->fechanacimiento = $fila->fechanacimiento_beneficiario->format('Y-m-d');
                           $beneficiario->codigo = $fila->codigo_beneficiario  ;
                           $beneficiario->dineroinvertido = $fila->dineroinvertido_beneficiario  ;   
                           $beneficiario->genero = $fila->genero_beneficiario  ;
                           $beneficiario->canton_id = $fila->canton_id_beneficiario   ;
                           $beneficiario->titular_id = $fila->titular_id_beneficiario  ;
                           $beneficiario->tipoestado_id= $fila->tipoestado_id_beneficiario   ;
                           $beneficiario->tipobono_id= $fila->tipobono_id_beneficiario      ;


                           $beneficiario->save();

                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con el beneficiario en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA beneficiario*/  

 
                 /*ANALIZANDO TABLA escuela*/
                $escuela = Escuela::where('id', $fila->id_escuela )->get();


                    foreach ($escuela as $key) {
                        $escuela = $key;
                    }
             
                    if(count($escuela)==0){
                        try{

                            if($fila->id_escuela != null && $fila->id_escuela>0){

                                $escuela = new Escuela();
                               $escuela->id = $fila->id_escuela   ;
                               $escuela->nombre = $fila->nombre_escuela   ;
                               $escuela->codigo = $fila->codigo_escuela   ;
                               $escuela->detalleDireccion = $fila->detalledireccion_escuela  ;   
                               $escuela->canton_id = $fila->canton_id_escuela     ;

                               $escuela->save();
                            }


                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con la escuela en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA escuela*/

 
                 /*ANALIZANDO TABLA centroDeSalud*/
                $centroDeSalud = CentroDeSalud::where('id', $fila->id_centrodesalud )->get();


                    foreach ($centroDeSalud as $key) {
                        $centroDeSalud = $key;
                    }

               
             
                    if(count($centroDeSalud)==0){
                        try{

                        if($fila->id_centrodesalud != null && $fila->id_centrodesalud>0){
                            $centroDeSalud = new CentroDeSalud();
                          $centroDeSalud->id = $fila->id_centrodesalud     ;
                           $centroDeSalud->nombre= $fila->nombre_centrodesalud    ;
                           $centroDeSalud->nivel = $fila->nivel_centrodesalud  ;
                           $centroDeSalud->codigo = $fila->codigo_centrodesalud     ;
                           $centroDeSalud->detalleDireccion = $fila->detalledireccion_centrodesalud  ;
                           $centroDeSalud->municipio_id =$fila->municipio_id_centrodesalud    ;
                           $centroDeSalud->save();
               
                           }

                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con el centroDeSalud en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA centroDeSalud*/  

                 /*ANALIZANDO TABLA promotor*/
                $promotor = Promotor::where('id', $fila->id_promotor )->get();


                    foreach ($promotor as $key) {
                        $promotor = $key;
                    }

               

                    if(count($promotor)==0){
                        try{

                        if($fila->id_promotor  != null && $fila->id_promotor >0){
                                $promotor = new Promotor();
                               $promotor->id = $fila->id_promotor  ;
                               $promotor->codigo = $fila->codigo_promotor  ;
                               $promotor->nombre = $fila->nombre_promotor  ;
                               $promotor->apellido = $fila->apellido_promotor    ;
                               $promotor->salario = $fila->salario_promotor     ;
                               $promotor->dui = $fila->dui_promotor     ;
                               $promotor->nit = $fila->nit_promotor     ;
                               $promotor->genero = $fila->genero_promotor  ;
                               $promotor->fechanacimiento = $fila->fechanacimiento_promotor->format('Y-m-d')  ;   
                               $promotor->ong_id =  $fila->ong_id_promotor   ;
                    
                               $promotor->save();
               
                           }

                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con el promotor en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO LA TRABLA PROMOTOR*/

                /*ANALIZANDO TABLA bitacorachilddescapacitado*/                                     

                $bitacorachilddescapacitado = BitacoraChildDiscapacitado::where('id', $fila->id_promotor )->get();


                    foreach ($bitacorachilddescapacitado as $key) {
                        $bitacorachilddescapacitado = $key;
                    }



                    if(count($bitacorachilddescapacitado)==0){
                        try{

                        if(   $fila->id_bitacorachilddescapacitado    != null &&    $fila->id_bitacorachilddescapacitado   >0){

                                $bitacorachilddescapacitado = new BitacoraChildDiscapacitado();
                               $bitacorachilddescapacitado->id = $fila->id_bitacorachilddescapacitado    ;
                               $bitacorachilddescapacitado->descripcion = $fila->descripcion_bitacorachilddescapacitado   ;
                               $bitacorachilddescapacitado->promotor_id =$fila->promotor_id_bitacorachilddescapacitado   ;
                               $bitacorachilddescapacitado->beneficiario_id = $fila->beneficiario_id_bitacorachilddescapacitado    ;
                              
                               $bitacorachilddescapacitado->save();

                           }

                            } catch(\Illuminate\Database\QueryException $ex){

    
                                Flash::Danger("Ocurrio un error con la bitacora de un niño con capacidades especiales en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA bitacorachilddescapacitado*/  

                /*ANALIZANDO TABLA bitacorachildestudiante*/                                     

                $bitacoraChildEstudiante = BitacoraChildEstudiante::where('id', $fila->id_bitacorachildestudiante   )->get();


                    foreach ($bitacoraChildEstudiante as $key) {
                        $bitacoraChildEstudiante = $key;
                    }




                    if(count($bitacoraChildEstudiante)==0){
                        try{

                              if($fila->id_bitacorachildestudiante != null &&   $fila->id_bitacorachildestudiante>0){

                           $bitacoraChildEstudiante = new BitacoraChildEstudiante() ;

                           $bitacoraChildEstudiante->id = $fila->id_bitacorachildestudiante   ;
                           $bitacoraChildEstudiante->inasistenciainjustificada = $fila->inasistenciainjustificada_bitacorachildestudiante    ;
                           $bitacoraChildEstudiante->motivoporinasistencias = $fila->motivoporinasistencia_bitacorachildestudiante    ;
                           $bitacoraChildEstudiante->dineroinvertido = $fila->dineroinvertido_bitacorachildestudiante  ;
                           $bitacoraChildEstudiante->escuela_id = $fila->escuela_id_bitacorachildestudiante   ;
                           $bitacoraChildEstudiante->promotor_id = $fila->promotor_id_bitacorachildestudiante  ;
                           $bitacoraChildEstudiante->beneficiario_id = $fila->beneficiario_id_bitacorachildestudiante   ;

                           $bitacoraChildEstudiante->save();

                               }
     
                            } catch(\Illuminate\Database\QueryException $ex){

                                Flash::Danger("Ocurrio un error con la bitacora de un niño bono por educacion en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA bitacorachildestudiante*/


                /*ANALIZANDO TABLA bitacorachildmenor*/                                     

                $bitacoraChildMenor= BitacoraChildMenor::where('id', $fila->id_bitacorachildmenor  )->get();


                    foreach ($bitacoraChildMenor as $key) {
                        $bitacoraChildMenor = $key;
                    }

                    if(count($bitacoraChildMenor)==0){
                        try{

                              if($fila->id_bitacorachildmenor  != null &&  $fila->id_bitacorachildmenor>0){
                                $bitacoraChildMenor = new BitacoraChildMenor();
                                   $bitacoraChildMenor->id =  $fila->id_bitacorachildmenor    ;
                                   $bitacoraChildMenor->fechacontrol = $fila->fechacontrol_bitacorachildmenor->format('Y-m-d')  ;
                                   $bitacoraChildMenor->descripcion = $fila->descripcion_bitacorachildmenor   ;
                                   $bitacoraChildMenor->asistio = $fila->asistio_bitacorachildmenor   ;
                                   $bitacoraChildMenor->motivopornoasistir = $fila->motivopornoasistir_bitacorachildmenor ;   
                                   $bitacoraChildMenor->padecimientos= $fila->padecimientos_bitacorachildmenor     ;
                                   $bitacoraChildMenor->dineroinvertido = $fila->dineroinvertido_bitacorachildmenor   ;
                                   $bitacoraChildMenor->centrodesalud_id= $fila->centrodesalud_id_bitacorachildmenor  ;
                                   $bitacoraChildMenor->promotor_id = $fila->promotor_id_bitacorachildmenor   ;
                                   $bitacoraChildMenor->beneficiario_id = $fila->beneficiario_id_bitacorachildmenor    ;
            
                                   $bitacoraChildMenor->save();
                               }
     
                            } catch(\Illuminate\Database\QueryException $ex){

                                Flash::Danger("Ocurrio un error con la bitacora de un niño menor de 5 años en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA bitacorachildmenor*/



                /*ANALIZANDO TABLA bitacorEmbarazada*/                                     

                $bitacoraEmbarazada= BitacoraEmbarazada::where('id', $fila->id_bitacoraembarazada)->get();


                    foreach ($bitacoraEmbarazada as $key) {
                        $bitacoraEmbarazada = $key;
                    }


                    if(count($bitacoraEmbarazada)==0){
                        try{

                              if($fila->id_bitacoraembarazada  != null && $fila->id_bitacoraembarazada>0){
                                $bitacoraEmbarazada = new BitacoraEmbarazada();
                                   $bitacoraEmbarazada->id = $fila->id_bitacoraembarazada    ;
                                   $bitacoraEmbarazada->fechacontrol= $fila->fechacontrol_bitacoraembarazada->format('Y-m-d');
                                   $bitacoraEmbarazada->descripcion = $fila->descripcion_bitacoraembarazada   ;
                                   $bitacoraEmbarazada->asistiocontrol= $fila->asistiocontrol_bitacoraembarazada    ;
                                   $bitacoraEmbarazada->motivopornoasistir = $fila->motivopornoasistir_bitacoraembarazada    ;
                                   $bitacoraEmbarazada->dineroinvertido = $fila->dineroinvertido_bitacoraembarazada   ;
                                   $bitacoraEmbarazada->centrodesalud_id = $fila->centrodesalud_id_bitacoraembarazada  ;
                                   $bitacoraEmbarazada->promotor_id = $fila->promotor_id_bitacoraembarazada   ;
                                   $bitacoraEmbarazada->beneficiario_id = $fila->beneficiario_id_bitacoraembarazada    ;


                                   $bitacoraEmbarazada->save();
                               }
     
                            } catch(\Illuminate\Database\QueryException $ex){

                                Flash::Danger("Ocurrio un error con la bitacora de una embarazada en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA bitacorEmbarazada*/

                /*ANALIZANDO TABLA bitacoraAdultoMayor*/                                     

                $bitacoraAdultoMayor= BitacoraAdultoMayor::where('id', $fila->id_bitacoraadultomayor )->get();


                    foreach ($bitacoraAdultoMayor as $key) {
                       $bitacoraAdultoMayor = $key;
                    }


                    if(count($bitacoraAdultoMayor)==0){
                        try{

                              if($fila->id_bitacoraadultomayor   != null && $fila->id_bitacoraadultomayor >0){
                                    $bitacoraAdultoMayor = new BitacoraAdultoMayor();
                                   $bitacoraAdultoMayor->id = $fila->id_bitacoraadultomayor   ;
                                   $bitacoraAdultoMayor->descripcion = $fila->descripcion_bitacoraadultomayor  ;
                                   $bitacoraAdultoMayor->promotor_id = $fila->promotor_id_bitacoraadultomayor  ;
                                   $bitacoraAdultoMayor->beneficiario_id = $fila->beneficiario_id_bitacoraadultomayor   ;

                                   $bitacoraAdultoMayor->save() ;

                               }
     
                            } catch(\Illuminate\Database\QueryException $ex){

                                Flash::Danger("Ocurrio un error con la bitacora de un adulto mayor en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA bitacoraAdultoMayor*/


                 /*ANALIZANDO TABLA bono*/                                     

                $bono= Bono::where('id', $fila->id_bono  )->get();


                    foreach ($bono as $key) {
                       $bono = $key;
                    }


                    if(count($bono)==0){
                        try{

                              if($fila->id_bono    != null && $fila->id_bono>0){
                                       $bono = new Bono();
                                       $bono->id =  $fila->id_bono  ;
                                       $bono->dineroacumulado= $fila->dineroacumulado_bono     ;
                                       $bono->fechainicioperiodo= $fila->fechainicioperiodo_bono->format('Y-m-d')  ;
                                       $bono->fechafinperiodo= $fila->fechafinperiodo_bono->format('Y-m-d')     ;
                                       $bono->periodofinalizo= $fila->periodofinalizo_bono;

                                       if ( $fila->bitacoraembarazada_id_bono == 0) {
                                           $bono->bitacoraembarazada_id= null ;
                                       }

                                       if ( $fila->bitacorachildmenor_id_bono == 0) {
                                           $bono->bitacorachildmenor_id= null;
                                       }

                                       if ( $fila->bitacoraadultomayor_id_bono== 0) {
                                            $bono->bitacoraadultomayor_id= null;
                                       }

                                       if ($fila->bitacorachilddiscapacitado_id_bono== 0) {
                                            $bono->bitacorachilddiscapacitado_id= null  ;
                                       }
                                       
                                        if ($bono->bitacorachildestudiante_id== 0) {
                                           $bono->bitacorachildestudiante_id= null;
                                       }

 
                                       $bono->save();

                               }
     
                            } catch(\Illuminate\Database\QueryException $ex){
                                
                                Flash::Danger("Ocurrio un error con la bitacora de un adulto mayor en la fila: " .$contador. " por favor verifique dichos datos");

                                return redirect()->route('etl');
                              exit; 
                        } 

                    }
                /*ANALIZANDO TABLA bono*/               


                    $contador = $contador +1;
                    $f = $f+1;
                Flash::Success("Se ingresaron los: ". $f." registros correctamente" );     
                });

            });
        }

          return redirect()->route('etl');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


