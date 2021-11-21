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
use App\Http\Controllers\FacturaController;





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


// Factura
Route::GET('/factura', [FacturaController::class, 'index'])->name('factura');
Route::GET('/facturaeg', [FacturaController::class, 'eg'])->name('facturaeg');



// Reportes
Route::GET('/consulta', [ConsultaController::class, 'index'])->name('consulta');
Route::POST('/consulta/all', [ConsultaController::class, 'all'])->name('all');
Route::POST('/consulta/all1', [ConsultaController::class, 'all1'])->name('all1');
Route::POST('/consulta/all3', [ConsultaController::class, 'all3'])->name('all3');
Route::POST('/consulta/all4', [ConsultaController::class, 'all4'])->name('all4');
Route::POST('/consulta/all5', [ConsultaController::class, 'all5'])->name('all5');
Route::POST('/consulta/all6', [ConsultaController::class, 'all6'])->name('all6');
Route::POST('/consulta/all7', [ConsultaController::class, 'all7'])->name('all7');


// Recordatorio de pensiones
Route::GET('/recordatorio1', [RecordatorioController::class, 'index1'])->name('recordatorio1');
Route::GET('/recordatorio2', [RecordatorioController::class, 'index2'])->name('recordatorio2');
Route::GET('/recordatorio3', [RecordatorioController::class, 'index3'])->name('recordatorio3');
Route::GET('/recordatorio4', [RecordatorioController::class, 'index4'])->name('recordatorio4');
Route::GET('/recordatorio5', [RecordatorioController::class, 'index5'])->name('recordatorio5');
Route::GET('/recordatorio6', [RecordatorioController::class, 'index6'])->name('recordatorio6');
Route::GET('/recordatorio7', [RecordatorioController::class, 'index7'])->name('recordatorio7');
Route::GET('/recordatorio8', [RecordatorioController::class, 'index8'])->name('recordatorio8');
Route::GET('/recordatorio9', [RecordatorioController::class, 'index9'])->name('recordatorio9');
Route::GET('/recordatorio10', [RecordatorioController::class, 'index10'])->name('recordatorio10');


Route::GET('/export1', [RecordatorioController::class, 'export1'])->name('export1');
Route::GET('/export2', [RecordatorioController::class, 'export2'])->name('export2');
Route::GET('/export3', [RecordatorioController::class, 'export3'])->name('export3');
Route::GET('/export4', [RecordatorioController::class, 'export4'])->name('export4');
Route::GET('/export5', [RecordatorioController::class, 'export5'])->name('export5');
Route::GET('/export6', [RecordatorioController::class, 'export6'])->name('export6');
Route::GET('/export7', [RecordatorioController::class, 'export7'])->name('export7');
Route::GET('/export8', [RecordatorioController::class, 'export8'])->name('export8');
Route::GET('/export9', [RecordatorioController::class, 'export9'])->name('export9');
Route::GET('/export10', [RecordatorioController::class, 'export10'])->name('export10');










