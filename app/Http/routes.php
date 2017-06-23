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
    return view('tactico.prueba');
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