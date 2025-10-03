<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\ProveedorController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('producto', ProductosController::class);
Route::resource('etiquetas', EtiquetaController::class);
Route::resource('proveedores', ProveedorController::class);

 

