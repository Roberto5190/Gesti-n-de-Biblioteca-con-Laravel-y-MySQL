<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('libros',    LibroController::class);
Route::resource('usuarios',  UsuarioController::class);
Route::resource('prestamos', PrestamoController::class);
