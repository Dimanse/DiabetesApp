<?php

use App\Http\Controllers\HistorialController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\TratamientoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ControlesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/controles',[ControlesController::class ,'show'] )->middleware(['auth', 'verified'])->name('controles.show');

Route::get('/control/create',[ControlesController::class ,'store'] )->middleware(['auth', 'verified'])->name('controles.create');

Route::get('/control/edit:{control}',[ControlesController::class ,'editar'] )->middleware(['auth', 'verified'])->name('controles.editar');

// Route::get('/control/{control:id}/destroy',[ControlesController::class ,'destroy'] )->middleware(['auth', 'verified'])->name('controles.destroy');



Route::get('/tratamiento',[TratamientoController::class ,'show'] )->middleware(['auth', 'verified'])->name('tratamiento.show');

Route::get('/tratamiento/create',[TratamientoController::class ,'create'] )->middleware(['auth', 'verified'])->name('tratamiento.create');

Route::get('/tratamiento/edit:{tratamiento}',[TratamientoController::class ,'editar'] )->middleware(['auth', 'verified'])->name('tratamiento.editar');


Route::get('/citas',[CitasController::class ,'show'] )->middleware(['auth', 'verified'])->name('citas.show');

Route::get('/citas/create',[CitasController::class ,'create'] )->middleware(['auth', 'verified'])->name('citas.create');

Route::get('/citas/edit:{cita}',[CitasController::class ,'editar'] )->middleware(['auth', 'verified'])->name('citas.editar');


Route::get('/datos',[HistorialController::class ,'show'] )->middleware(['auth', 'verified'])->name('informacion.show');

Route::get('/datos/create',[HistorialController::class ,'store'] )->middleware(['auth', 'verified'])->name('informacion.create');

Route::get('/datos/edit:{historial}',[HistorialController::class ,'edit'] )->middleware(['auth', 'verified'])->name('informacion.editar');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
