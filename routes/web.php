<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ConsultaController;






// Soy el mejor ctm




Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminController::class, 'index' ])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/users', [UserController::class, 'index' ])->name('users');
Route::middleware(['auth:sanctum', 'verified'])->get('/ingresos', [IngresoController::class, 'index' ])->name('ingresos');
Route::middleware(['auth:sanctum', 'verified'])->get('/egresos', [EgresoController::class, 'index' ])->name('egresos');
// Route::middleware(['auth:sanctum', 'verified'])->get('/reportes', [AdminController::class, 'index' ])->name('dashboard');





Route::resource('users', UserController::class)->names('users');


Route::resource('alumnos', AlumnoController::class)->names('alumnos');


Route::resource('ingresos', IngresoController::class)->names('ingresos');


Route::resource('egresos', EgresoController::class)->names('egresos');


Route::resource('personals', PersonalController::class)->names('personals');

// Reportes
Route::GET('/consulta', [ConsultaController::class, 'index'])->name('consulta');
Route::POST('/consulta/all', [ConsultaController::class, 'all'])->name('all');
Route::POST('/consulta/all1', [ConsultaController::class, 'all1'])->name('all1');








