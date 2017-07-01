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
use App\Bitacorachildestudiante;
use App\bitacorachilddiscapacitado;
use App\BitacoraChildMenor;
use DateTime;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class faltandoController extends Controller
{
    
    public function index(){


    		try{
	        	$departamento = Departamento::all();
	 
    		}catch(\PDOException $ex ){
    			
    			Flash::Danger("Error en la conexion");
    			return view('faltandoMenores.menoresFaltando'); /*Nombre la carpeta
                 que tienen las vistas la vista es menoresFaltando.php*/
    		}

         $departamento->each(function($departamento){
         	$departamento->municipio;
         	foreach ($departamento->municipio as $key => $value) {
         		$value->canton;
         	}
         	

         });

        // dd($departamento);
        return view('faltandoMenores.menoresFaltando',compact('departamento'));/*Nombre la carpeta
                 que tienen las vistas la vista es menoresFaltando.php y hace referencia con el depart*/
    }

    public function municipiofaltando(Request $request,$id){/*Se le envia el municipio*/

    	if($request->ajax()){
    		$municipio = Municipio::municipios($id);
    		return response()->json($municipio);
    	}
    }

    public function cantonfaltando(Request $request,$id){

        if($request->ajax()){
            $canton = Canton::cantones($id);
            return response()->json($canton);
        }
    }


    public function store(Request $request)/*Almacena el objeto*/
    {
        //dd($request->all());
        $canton = Canton::where('id',$request->canton)->get();/*muestras el id del canton*/
        $municipio = Municipio::where ('id',$request->municipio)->get();
    
        $fechaInicio = new DateTime($request->fechaInicio);
        $fechaFin = new DateTime($request->fechaFin);

        $dias = $fechaInicio->diff($fechaFin);

        $meses = round($dias->days/30);



           $faltas =DB::table('beneficiario') 
            ->join('bitacorachildestudiante', 'beneficiario.id', '=', 'bitacorachildestudiante.Beneficiario_id')
            ->join('escuela', 'escuela.id', '=', 'bitacorachildestudiante.Escuela_id')
            ->join('bono','bono.Bitacorachildestudiante_id','=','bitacorachildestudiante.id')
            ->select('beneficiario.codigo','beneficiario.apellidos','beneficiario.nombres','escuela.nombre')
            ->distinct()
            ->where('beneficiario.Canton_id',$request->canton)
            ->whereRAW("(TipoEstado_id = 2 and TipoBono_id=1)")
            ->where('bono.fechaInicioPeriodo', '<=', Carbon::createFromFormat('Y-m-d', $request->fechaInicio)->toDateString())
            ->where('bono.fechaFinPeriodo', '>=', Carbon::createFromFormat('Y-m-d', $request->fechaFin)->toDateString())
            ->where('bitacorachildestudiante.inasistenciaInjustificada',1)
            ->get();

    if(count($faltas)==0)  {
               			
          Flash::Warning("No hay niños Faltando a clases");

           return redirect()->route('seleccionDatosFaltando');
         }




        return view('faltandoMenores.resultadomenoresFaltando')
        ->with('fechaInicio',$request->fechaInicio)/*Pone la fecha inicio*/
        ->with('fechaFin',$request->fechaFin)/*pone la fecha fin*/
        ->with('municipio',$municipio)
        ->with('canton',$canton)
        ->with(['faltas' => $faltas]);


    }


  



   public function show($id)
    {
        //
    }

      public function crearPDF(Request $request){


        $canton = Canton::where('id',$request->canton)->get();/*muestras el id del canton*/
        $municipio = Municipio::where ('id',$request->municipio)->get();
    
        $fechaInicio = new DateTime($request->fechaInicio);
        $fechaFin = new DateTime($request->fechaFin);

        $dias = $fechaInicio->diff($fechaFin);

        $meses = round($dias->days/30);



           $faltas =DB::table('beneficiario') 
            ->join('bitacorachildestudiante', 'beneficiario.id', '=', 'bitacorachildestudiante.Beneficiario_id')
            ->join('escuela', 'escuela.id', '=', 'bitacorachildestudiante.Escuela_id')
            ->join('bono','bono.Bitacorachildestudiante_id','=','bitacorachildestudiante.id')
            ->select('beneficiario.codigo','beneficiario.apellidos','beneficiario.nombres','escuela.nombre')
            ->distinct()
            ->where('beneficiario.Canton_id',$request->canton)
            ->whereRAW("(TipoEstado_id = 2 and TipoBono_id=1)")
            ->where('bono.fechaInicioPeriodo', '<=', Carbon::createFromFormat('Y-m-d', $request->fechaInicio)->toDateString())
            ->where('bono.fechaFinPeriodo', '>=', Carbon::createFromFormat('Y-m-d', $request->fechaFin)->toDateString())
            ->where('bitacorachildestudiante.inasistenciaInjustificada',1)
            ->get();




        $view = \View::make('faltandoMenores.reporteMenoresFaltando')
        ->with('fechaInicio',$request->fechaInicio)/*Pone la fecha inicio*/
        ->with('fechaFin',$request->fechaFin)/*pone la fecha fin*/
        ->with('municipio',$municipio)
        ->with('canton',$canton)
        ->with(['faltas' => $faltas]) 
        ->render();
     
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
     
        return $pdf->download("Reporte kids faltando a clases.pdf");
 }  

}