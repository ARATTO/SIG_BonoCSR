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
        $hombre = 0;
        $mujer = 0;

        $beneficiario = Beneficiario::where('Canton_id', $request->canton)->get();
        //dd($beneficiario);
        foreach($beneficiario as $bene){
            $bene->titular = Titular::where('id', $bene->Titular_id);
        }
        //dd($beneficiario);
        foreach($beneficiario as $bene){
           //dd($bene);
            if( strcmp ( $bene->genero , 'm' ) == 0 || strcmp ( $bene->genero , 'M' ) == 0 ){
                $hombre = $hombre + 1;
            }else{
                $mujer = $mujer +1;
            }
        }
        
        return view('tit_genero.resultado');
        //dd($request->all());
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
