<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\Horarios_laboralesController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\DetallePresupuestoController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USUARIO
Route::get('/configuracion', [UserController::class, 'config'])->name('config');
Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/avatar/{filename?}', [UserController::class, 'getImage'])->name('user.avatar');

// USUARIOS
Route::get('users/listar', [UsersController::class, 'index'])->name('users.listar');
Route::get('users/create', [UsersController::class, 'crear'])->name('users.crear');
Route::post('users/create', [UsersController::class, 'store'])->name('users.store');

Route::get('users/configuracion/{id}', [UsersController::class, 'configuracion'])->name('users.configuracion');
Route::put('users/configuracion/{id}', [UsersController::class, 'update'])->name('users.update');
Route::delete('users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

//PACIENTES

Route::get('pacientes/crear', [PacienteController::class, 'crear'])->name('pacientes.crear');
Route::post('pacientes/crear', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('pacientes/index', [PacienteController::class, 'index'])->name('pacientes.index');
// Ruta para actualizar un horario laboral existente
Route::put('pacientes/{id}', [Horarios_laboralesController::class, 'update'])->name('pacientes.update');
// Ruta para mostrar el formulario de edición de un paciente
Route::get('pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
// Ruta para eliminar un horario laboral existente
Route::delete('pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');


//Horario de usuarios
// Ruta para mostrar todos los horarios laborales
Route::get('horarios_laborales/index', [Horarios_laboralesController::class, 'index'])->name('horarios_laborales.index');
// Ruta para mostrar el formulario de creación de un nuevo horario
Route::get('horarios_laborales/create', [Horarios_laboralesController::class, 'create'])->name('horarios_laborales.create');
// Ruta para almacenar un nuevo horario laboral
Route::post('horarios_laborales/create', [Horarios_laboralesController::class, 'store'])->name('horarios_laborales.store');
// Ruta para mostrar el formulario de edición de un horario existente
Route::get('horarios_laborales/{id}/edit', [Horarios_laboralesController::class, 'edit'])->name('horarios_laborales.edit');
// Ruta para actualizar un horario laboral existente
Route::put('horarios_laborales/{id}', [Horarios_laboralesController::class, 'update'])->name('horarios_laborales.update');
// Ruta para eliminar un horario laboral existente
Route::delete('horarios_laborales/{id}', [Horarios_laboralesController::class, 'destroy'])->name('horarios_laborales.destroy');
// Ruta para mostrar el calendario de horarios laborales
Route::get('horarios_laborales/calendar', [Horarios_laboralesController::class, 'calendar'])->name('horarios_laborales.calendar');


//ruta para gestion de citas
use App\Http\Controllers\CitasController;


Route::resource('citas', CitasController::class);
Route::get('/get-dentistas-disponibles', [CitasController::class, 'getDentistasDisponibles']);
Route::get('/citas/get-presupuestos-pendientes/{pacienteId}', [CitasController::class, 'obtenerPresupuestosPendientes']);
// Cambia el nombre de la ruta para evitar el conflicto
Route::get('citas/{id}/edit-horarios', [Horarios_laboralesController::class, 'edit'])->name('horarios.citas.edit');



// Cambia el nombre de la ruta manual
Route::get('presupuestos/index-manual', [PresupuestoController::class, 'index'])->name('presupuestos.index.manual');

// Mantén las demás rutas
Route::post('/detalles-presupuesto/store', [DetallePresupuestoController::class, 'store'])->name('detalles-presupuesto.store');
Route::resource('presupuestos', PresupuestoController::class);
Route::get('/detalles-presupuesto', [DetallePresupuestoController::class, 'index'])->name('detalles-presupuesto.index');
Route::post('detalles/store', [DetallePresupuestoController::class, 'store'])->name('detalles.store');

