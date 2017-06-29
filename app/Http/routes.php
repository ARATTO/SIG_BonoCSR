<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
*
* RUTAS GENERICAS
*
*/
Route::auth();
Route::get('/admin', 'HomeController@index');
/*
*
* RUTAS GENERICAS
*
*/
//////////////////////////////////////////////////////////////////////////////////
/*
*
* RUTAS MOTTO
*
*/
        /*
        * Inicio Rutas para User
        */
        Route::resource('users','UserController');
        /*
        * Fin Rutas para User
        */
        /*
        * Inicio Rutas para Titulares por Genero y Edad
        */
        Route::get('titulares_genero',[
          'uses' => 'MTitularesGenero@index',
          'as' => 'tit_genero'
        ]);
        Route::post('titulares_genero_cargar', [
          'uses' => 'MTitularesGenero@store', 
          'as'   => 'titulares_genero_cargar'
        ]);
        Route::post('titulares_genero_resultado', [
          'uses' => 'MTitularesGenero@resultado', 
          'as'   => 'titulares_genero_resultado'
        ]);
        /*
        * Fin Rutas para Titulares por Genero y Edad
        */
        
/*
*
* FIN RUTAS MOTTO
*
*/

//////////////////////////////////////////////////////////////////////////////////

/*
*
* RUTAS RODRIGO
*
*/
Route::get('/prueba', function () {
    return view('inversiones.resultadoInversionAdulto');
});



 Route::get('etl', [
    'uses' => 'EtlController@index', 
    'as'    => 'etl'
            ]);


  Route::post('cargarDatos', [
    'uses' => 'EtlController@store', 
    'as'    => 'cargarDatos'
            ]);

  Route::get('inversion',[
    'uses' => 'inversionesController@index',
    'as' => 'seleccionarDatos'
    ]);

  Route::get('datosInversion',[
    'uses' => 'inversionesController@show',
    'as' => 'datosInversion'
    ]);



 Route::get('municipioInversiones/{id}','inversionesController@municipioInversiones');

Route::get('cantonInversiones/{id}','inversionesController@cantonInversiones');

  Route::post('datos', [
    'uses' => 'inversionesController@store', 
    'as'    => 'datos'
            ]);




/*
*
* FIN RUTAS RODRIGO
*
*/

//////////////////////////////////////////////////////////////////////////////////