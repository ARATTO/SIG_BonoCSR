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

class MTitularesGenero extends Controller
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
    		return view('tit_genero.index');
    	}

        $departamento->each(function($departamento){
         	$departamento->municipio;
         	foreach ($departamento->municipio as $key => $value) {
         		$value->canton;
         	}
        });

        // dd($departamento);
        return view('tit_genero.index',compact('departamento'));
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
        $canton = $request->canton;
        $hombre = 0;
        $mujer = 0;
        $edad_inicio = $request->edad_inicio;
        $edad_fin = $request->edad_fin;
        
        $titular = DB::table('titular')
            ->join('beneficiario', 'beneficiario.Titular_id', '=', 'titular.id')
            ->select('titular.genero','titular.fechaNacimiento')
            ->where('beneficiario.Canton_id', $canton)
            ->get();
        
        foreach($titular as $tit){           
            if( strcmp ( $tit->genero , 'm' ) == 0 || strcmp ( $tit->genero , 'M' ) == 0 ){
                $edad =  $this->calcular_edad($bene->fechaNacimiento);
                //Restriccion de Edad para Hombre
                if(  $edad >= $edad_inicio && $edad <= $edad_fin )
                    $hombre = $hombre + 1;
            }else{
                $edad =  $this->calcular_edad($bene->fechaNacimiento);
                //Restriccion de Edad para Hombre
                if(  $edad >= $edad_inicio && $edad <= $edad_fin )
                    $mujer = $mujer +1;
            }
        }
        
        return view('tit_genero.resultado')->with([
            'hombre' => $hombre,
            'mujer' => $mujer,
            'canton' => $canton,
            'edad_inicio' => $edad_inicio,
            'edad_fin' => $edad_fin,
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

    public function calcular_edad($fecha){
        $dias = explode("-", $fecha, 3);
        $dias = mktime(0,0,0,$dias[2],$dias[1],$dias[0]);
        $edad = (int)((time()-$dias)/31556926 );
        return $edad;
    }
}
