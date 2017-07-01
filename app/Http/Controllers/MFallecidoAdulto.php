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
use App\Titular;
use DateTime;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class MFallecidoAdulto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
	        $departamento = Departamento::all();
    	}catch(\PDOException $ex ){
    		Flash::Danger("Error en la conexion");
    		return view('fallecido_adulto.index');
    	}

        $departamento->each(function($departamento){
         	$departamento->municipio;
         	foreach ($departamento->municipio as $key => $value) {
         		$value->canton;
         	}
        });

        return view('fallecido_adulto.index',compact('departamento'));
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
        $canton = Canton::find($request->canton);

        $adultos = DB::table('bitacoraadultomayor')
            ->join('beneficiario', 'beneficiario.id' , '=', 'bitacoraadultomayor.Beneficiario_id')
            ->join('bono', 'bitacoraadultomayor.id' , '=', 'bono.BitacoraAdultoMayor_id')
            ->select('beneficiario.codigo', 'beneficiario.nombre','beneficiario.apellidos')
            ->where('beneficiario.TipoEstado_id', 1) // se pone 1 para la consulta necesaria 
            ->where('beneficiario.TipoBono_id', 3)
            ->whereDate('bono.fechaInicioPeriodo', '<=', $request->fechaInicio)
            ->whereDate('bono.fechaFinPeriodo', '>=', $request->fechaFin)
            ->distinct()
            ->get();
        
        //dd($adultos);
        $cuantos_adultos = count($adultos);

        if( $cuantos_adultos <= 0){
            Flash::info("No hay Adultos Mayores asociados a este Canton con esos parametros.");
            return redirect()->route('fallecido_adulto');
        }

        return view('fallecido_adulto.resultado')->with([
            'adultos' => $adultos,
            'cantidad' => $cuantos_adultos,
            'canton' => $canton,
            'fecha_inicio' => $request->fechaInicio,
            'fecha_fin' => $request->fechaFin,
        ]);
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

    public function crearPDF(Request $request){
        //dd($request->all());
        $canton = Canton::find($request->canton);

        $adultos = DB::table('bitacoraadultomayor')
            ->join('beneficiario', 'beneficiario.id' , '=', 'bitacoraadultomayor.Beneficiario_id')
            ->join('bono', 'bitacoraadultomayor.id' , '=', 'bono.BitacoraAdultoMayor_id')
            ->select('beneficiario.codigo', 'beneficiario.nombre','beneficiario.apellidos')
            ->where('beneficiario.TipoEstado_id', 1) // se pone 1 para la consulta necesaria 
            ->where('beneficiario.TipoBono_id', 3)
            ->whereDate('bono.fechaInicioPeriodo', '<=', $request->fecha_inicio)
            ->whereDate('bono.fechaFinPeriodo', '>=', $request->fecha_fin)
            ->distinct()
            ->get();
        
        //dd($adultos);
        $cuantos_adultos = count($adultos);

        if( $cuantos_adultos <= 0){
            Flash::info("No hay Adultos Mayores asociados a este Canton con esos parametros.");
            return redirect()->route('fallecido_adulto');
        }
 

        $view = \View::make('fallecido_adulto.reporte')
        ->with('adultos',$adultos)
        ->with('cantidad',$cuantos_adultos)
        ->with('canton',$canton)
        ->with('fecha_inicio',$request->fecha_inicio)
        ->with('fecha_fin',$request->fecha_fin)
        ->render();
        //dd($view);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        return $pdf->download("Reporte Fallecidos Bono Adulto Mayor en Canton $canton->nombre.pdf");
    }
}
