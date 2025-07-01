<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

/* ------------------ Login (obtiene token) ------------------ */
Route::post('/api/login', [ApiAuthController::class, 'login'])
      ->middleware('api');   // sin CSRF


/* ------------------ API protegida con Sanctum -------------- */
Route::middleware(['auth:sanctum', 'api'])->prefix('api')->group(function () {

    Route::post('/logout', [ApiAuthController::class, 'logout']);

    //Recursos REST
    Route::resource('libros',    LibroController::class);
    Route::resource('usuarios',  UsuarioController::class);
    Route::resource('prestamos', PrestamoController::class);

    //Usuario Autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
	->middleware(['auth:sanctum', 'api'])     
	->name('dashboard');

    //ScopeVencidos
    Route::get('prestamos/vencidos', [PrestamoController::class, 'vencidos'])
        	->name('prestamos.vencidos');
});
