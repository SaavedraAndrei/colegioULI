<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\EgresoController;






Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminController::class, 'index' ])->name('dashboard');

Route::get('/prueba', function () {
    return view('prueba');
});

// Route::get('registrar', [RegistrarController::class, 'index'])->name('registrar');
// Route::post('registrar', [RegistrarController::class, 'index'])->name('registrar');


Route::resource('alumnos', AlumnoController::class)->names('alumnos');


Route::resource('ingresos', IngresoController::class)->names('ingresos');


Route::resource('egresos', EgresoController::class)->names('egresos');




