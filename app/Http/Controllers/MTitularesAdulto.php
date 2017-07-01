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

class MTitularesAdulto extends Controller
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
    		return view('tit_adulto.index');
    	}

        $departamento->each(function($departamento){
         	$departamento->municipio;
         	foreach ($departamento->municipio as $key => $value) {
         		$value->canton;
         	}
        });

        return view('tit_adulto.index',compact('departamento'));
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
        $canton = Canton::find($request->canton);

        $adultos = DB::table('bitacoraadultomayor')
            ->join('beneficiario', 'beneficiario.id' , '=', 'bitacoraadultomayor.Beneficiario_id')
            ->join('titular', 'titular.id' , '=', 'beneficiario.Titular_id')
            ->join('bono', 'bitacoraadultomayor.id' , '=', 'bono.BitacoraAdultoMayor_id')
            ->select('titular.id')
            ->where('beneficiario.Canton_id', $request->canton)
            
            ->where('bono.dineroAcumulado', $request->monto)
            ->whereDate('bono.fechaInicioPeriodo', '<=', $request->fechaInicio)
            ->whereDate('bono.fechaFinPeriodo', '>=', $request->fechaFin)
            
            ->distinct()
            ->get();
        
        //dd($adultos);
        $cuantos_adultos = count($adultos);
        

        if($cuantos_adultos <= 0){
            Flash::info("No hay Titulares asociados a este Canton con esos parametros.");
            return redirect()->route('tit_adulto');
        }

        return view('tit_adulto.resultado')->with([
            'adultos' => $cuantos_adultos,
            'canton' => $canton,
            'cantidad' => $request->monto,
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
        $view = \View::make('tit_adulto.reporte')
        ->with('canton',$request->canton)
        ->with('adultos',$request->adultos)
        ->with('cantidad',$request->cantidad)
        ->with('fecha_inicio',$request->fecha_inicio)
        ->with('fecha_fin',$request->fecha_fin)
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        return $pdf->download("Reporte Titulares Adulto Mayor en Canton $request->canton.pdf");
    }
}
