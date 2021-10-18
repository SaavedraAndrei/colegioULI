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
use App\Http\Controllers\RecordatorioController;




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
Route::POST('/consulta/all3', [ConsultaController::class, 'all3'])->name('all3');
Route::POST('/consulta/all4', [ConsultaController::class, 'all4'])->name('all4');
Route::POST('/consulta/all5', [ConsultaController::class, 'all5'])->name('all5');

// Recordatorio de pensiones
Route::GET('/recordatorio1', [RecordatorioController::class, 'index1'])->name('recordatorio1');
Route::GET('/recordatorio2', [RecordatorioController::class, 'index2'])->name('recordatorio2');
Route::GET('/recordatorio3', [RecordatorioController::class, 'index3'])->name('recordatorio3');
Route::GET('/recordatorio4', [RecordatorioController::class, 'index4'])->name('recordatorio4');

Route::GET('/export1', [RecordatorioController::class, 'export1'])->name('export1');
Route::GET('/export2', [RecordatorioController::class, 'export2'])->name('export2');
Route::GET('/export3', [RecordatorioController::class, 'export3'])->name('export3');
Route::GET('/export4', [RecordatorioController::class, 'export4'])->name('export4');









