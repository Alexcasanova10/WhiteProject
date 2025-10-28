<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdenController;

Route::get('/', function () {
    return view('landing-page');
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/imprimir', [App\Http\Controllers\GeneradorController::class, 'imprimir'])->name('imprimir');
Route::get('/imprimirBD',[App\Http\Controllers\GeneradorController::class, 'imprimirBD'])->name('imprimirBD');

// Route::resource('asset', AssetController::class)->middleware('auth');
Route::resource('asset', AssetController::class);
 
Route::get('/video-file/{filename}', array(
   'as' => 'fileVideo',
   'uses' => 'App\Http\Controllers\AssetController@getVideo'
));
Route::get('/miniatura/{filename}', array(
   'as' => 'imageVideo',
   'uses' => 'App\Http\Controllers\AssetController@getImage'
));

Route::resource('producto', ProductosController::class);
Route::resource('etiquetas', EtiquetaController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('ordenes', OrdenController::class);

Route::get('/correo-prueba', [CorreoController::class, 'enviarPrueba']);
 

