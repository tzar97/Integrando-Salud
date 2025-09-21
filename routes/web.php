<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TipoPetController;
use App\Http\Controllers\TratamientoController;





                                        // MENU  


Route::get('/', function () {return Inertia::render('Pacientes/Index');})->name('menu'); // tu menú principal




                                        //PACIENTES

Route::get('/pacientes/listado', [PacienteController::class, 'index'])->name('pacientes.listado');

Route::get('/pacientes/nuevo', [PacienteController::class, 'create'])->name('pacientes.nuevo');

Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');

Route::get('/pacientes/{paciente}/editar', [PacienteController::class, 'edit'])->name('pacientes.edit');

Route::put('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');



                                            //PET

Route::get('/pet/lista', [TipoPetController::class, 'index'])->name('pet.index');

Route::get('/pet/crear', [TipoPetController::class, 'create'])->name('pet.create');

Route::post('/pet/cargado', [TipoPetController::class, 'store'])->name('pet.store');

Route::get('/pet/{tipo}/editar', [TipoPetController::class, 'edit'])->name('pet.edit');

Route::put('/pet/{tipo}', [TipoPetController::class, 'update'])->name('pet.update');

Route::patch('/pet/{tipo}/cambiar-estado', [TipoPetController::class, 'cambiarEstado'])->name('pet.cambiar-estado');



                                        // TRATAMIENTOS

Route::get('/pacientes/{paciente}/tratamientos', [TratamientoController::class, 'index'])->name('tratamientos.index');

Route::get('/pacientes/{paciente}/tratamientos/crear', [TratamientoController::class, 'create'])->name('tratamientos.create');

Route::post('/pacientes/{paciente}/tratamientos', [TratamientoController::class, 'store'])->name('tratamientos.store');

Route::delete('/pacientes/{paciente}/tratamientos/{tratamiento}', [TratamientoController::class, 'destroy'])->name('tratamientos.destroy');

