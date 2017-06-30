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
use DB;

class MenoresFController extends Controller
{
    
    public function index(){


    		try{
	        	$departamento = Departamento::all();
	 
    		}catch(\PDOException $ex ){
    			
    			Flash::Danger("Error en la conexion");
    			return view('menores.menoresFallecidos'); /*Nombre la carpeta
                 que tienen las vistas la vista es menoresFallecidos.php*/
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



           $u2 = DB::table('beneficiario')
           ->join('bitacorachilddiscapacitado', 'beneficiario.id', '=', 'bitacorachilddiscapacitado.Beneficiario_id')
           ->join('bono','bitacorachilddiscapacitado.id','=','bono.BitacoraChildDiscapacitado_id')
           ->select('beneficiario.codigo','beneficiario.apellidos','beneficiario.nombres','beneficiario.fechaNacimiento')
           ->where('beneficiario.Canton_id',$request->canton)
           ->whereRAW("(TipoEstado_id = 1)");



            $u3 = DB::table('beneficiario')
           ->join('bitacorachildmenor', 'beneficiario.id', '=', 'bitacorachildmenor.Beneficiario_id')
           ->join('bono','bitacorachildmenor.id','=','bono.BitacoraChildMenor_id')
           ->select('beneficiario.codigo','beneficiario.apellidos','beneficiario.nombres','beneficiario.fechaNacimiento')
           ->where('beneficiario.Canton_id',$request->canton)
           ->whereRAW("(TipoEstado_id = 1)");



           

           $u1 =DB::table('beneficiario') 
            ->join('bitacorachildestudiante', 'beneficiario.id', '=', 'bitacorachildestudiante.Beneficiario_id')
            ->join('bono','bitacorachildestudiante.id','=','bono.BitacoraChildEstudiante_id')
            ->select('beneficiario.codigo','beneficiario.apellidos','beneficiario.nombres','beneficiario.fechaNacimiento')
            ->where('beneficiario.Canton_id',$request->canton)
            ->whereRAW("(TipoEstado_id = 1)")
            ->whereIn('beneficiario.TipoBono_id',[1, 2])
            ->union($u2)
            ->union($u3)
            ->get();




        return view('menoresF.resultadomenoresFallecidos')
        ->with('fechaInicio',$request->fechaInicio)/*Pone la fecha inicio*/
        ->with('fechaFin',$request->fechaFin)/*pone la fecha fin*/
        ->with('municipio',$municipio)
        ->with('canton',$canton)
        ->with(['u1'=>$u1]);

    }


  



    public function show(){


    }


}
