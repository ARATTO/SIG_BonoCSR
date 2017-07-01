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
        Route::get('/tit_genero_resultado', function () {
          return view('tit_genero.resultado');
        });
        Route::post('tit_genero_reporte',[
          'uses' => 'MTitularesGenero@crearPDF',
          'as' => 'tit_genero_reporte'
        ]);
        /*
        * Fin Rutas para Titulares por Genero y Edad
        */

        /*
        * Inicio Rutas para Titulares Adulto
        */
        Route::get('titulares_adulto',[
          'uses' => 'MTitularesAdulto@index',
          'as' => 'tit_adulto'
        ]);
        Route::post('titulares_adulto_cargar', [
          'uses' => 'MTitularesAdulto@store', 
          'as'   => 'titulares_adulto_cargar'
        ]);
        Route::get('/tit_adulto_resultado', function () {
          return view('tit_adulto.resultado');
        });
        Route::post('tit_adulto_reporte',[
          'uses' => 'MTitularesAdulto@crearPDF',
          'as' => 'tit_adulto_reporte'
        ]);
        /*
        * Fin Rutas para Titulares Adulto
        */
        
        /*
        * Inicio Rutas para Titulares Niños y Embarazada
        */
        Route::get('titulares_ne',[
          'uses' => 'MTitularesNE@index',
          'as' => 'tit_ne'
        ]);
        Route::post('titulares_ne_cargar', [
          'uses' => 'MTitularesNE@store', 
          'as'   => 'titulares_ne_cargar'
        ]);
        Route::get('/tit_ne_resultado', function () {
          return view('tit_ne.resultado');
        });
        Route::post('tit_ne_reporte',[
          'uses' => 'MTitularesNE@crearPDF',
          'as' => 'tit_ne_reporte'
        ]);
        /*
        * Fin Rutas para Titulares Niños y Embarazada
        */

        /*
        * Inicio Rutas para Fallecido Adulto
        */
        Route::get('fallecido_adulto',[
          'uses' => 'MFallecidoAdulto@index',
          'as' => 'fallecido_adulto'
        ]);
        Route::post('fallecido_adulto_cargar', [
          'uses' => 'MFallecidoAdulto@store', 
          'as'   => 'fallecido_adulto_cargar'
        ]);
        Route::get('/fallecido_adulto_resultado', function () {
          return view('fallecido_adulto.resultado');
        });
        Route::post('fallecido_adulto_reporte',[
          'uses' => 'MFallecidoAdulto@crearPDF',
          'as' => 'fallecido_adulto_reporte'
        ]);
        /*
        * Fin Rutas para Fallecido Adulto
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