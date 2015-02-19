<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', function() {   // Esta será nuestra ruta de bienvenida.
    return View::make('pages.home');
});

Route::get('registre', 'RegistreController@showFormulari');  // Nos mostrará el formulario de registro.
Route::post('registre', 'RegistreController@postRegistre');  // Validamos los datos de inserción del usuario.

Route::get('login', 'AuthController@showLogin'); // Nos mostrará el formulario de login.
Route::post('login', 'AuthController@postLogin'); // Validamos los datos de inicio de sesión.

Route::get('contactar', 'ContactarController@showFormulari'); //Nos mostrara el formulario de contactar
Route::post('contactar', 'ContactarController@postFormulari'); //Validamos los datos de contactar

Route::post('buscarruta','BuscarController@showrutas'); //Nos mostrará las rutas buscadas


// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function() {

    Route::group(array('prefix' => 'perfil'), function() {
        Route::get('/', function() {
            //return Redirect::to('/');
            return View::make('pages.perfil');
        });
        Route::get('missatges', function() {
//            return Redirect::to('/');
            return View::make('pages.missatges');
        });
        Route::get('viatges', function() {
            return Redirect::to('/');
            //return View::make('pages.viatges');
        });
    });
    Route::get('publicarViatge', function() {
        return Redirect::to('/');
        //return View::make('pages.publicarViatge');
    });
    Route::get('publicarViatge', function() {
        return Redirect::to('/');
        //return View::make('pages.publicarViatge');
    });
    Route::get('buscar', function() {
        return Redirect::to('/');
        //return View::make('pages.buscar');
    });
    Route::get('detallViatge', function() {
        return View::make('pages.viatgeDetalls');
        //return View::make('pages.detallViatge');
    });
    Route::get('logout', 'AuthController@logOut'); // Esta ruta nos servirá para cerrar sesión.
});

// ----- //
Route::get('marca', array('uses' => 'MarcaController@mostrarMarcas'));

Route::group(array('prefix' => 'api/v1'), function() {
//    --------------------- SELECCT ALL ----------------------
    Route::resource('marca', 'UrlController@selectallmarca');
    Route::resource('usuaris', 'UrlController@selectallusuaris');
    Route::resource('correu', 'UrlController@selectallcorreu');
    Route::resource('vehicles', 'UrlController@selectallvehicles');
    Route::resource('vehicles_usuaris', 'UrlController@selectallvehiclesusuaris');
    Route::resource('caracteristiques', 'UrlController@selectallcaracteristiques');
    Route::resource('passatger', 'UrlController@selectallpassatger');
    Route::resource('ruta', 'UrlController@selectallruta');
    Route::resource('model', 'UrlController@selectallmodel');
    Route::resource('periodicitat', 'UrlController@selectallperiodicitat');
    Route::resource('viatge', 'UrlController@selectallviatge');

//    --------------------- IDS ----------------------

    Route::resource('marcaid', 'UrlController@selectmarcaid');
    Route::resource('usuarisid', 'UrlController@selectusuarisid');
    Route::resource('correuid', 'UrlController@selectcorreuid');
    Route::resource('vehiclesid', 'UrlController@selectvehiclesid');
    Route::resource('vehicles_usuarisid', 'UrlController@selectvehiclesusuarisid');
    Route::resource('caracteristiquesid', 'UrlController@selectcaracteristiquesid');
    Route::resource('passatgerid', 'UrlController@selectpassatgerid');
    Route::resource('rutaid', 'UrlController@selectrutaid');
    Route::resource('modelid', 'UrlController@selectmodelid');
    Route::resource('periodicitatid', 'UrlController@selectperiodicitatid');
    Route::resource('viatgeid', 'UrlController@selectviatgeid');
});

/*Route::get('marcawhere/{nombrecampo}/{model}', function($nombrecampo,$model)
{
        return Marca::where($nombrecampo, '=', $model)
        ->get();
});*/


