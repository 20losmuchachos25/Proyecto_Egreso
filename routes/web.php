<?php

use App\Http\Controllers\DesarrolloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\WelocomeAdminController;
use App\Http\Controllers\AgendaController;

// Regitro para registrar usuarios
Route::get('/Registro', [RegistroController::class, 'index'])->name('verRegistro');
Route::post('/Registro', [RegistroController::class, 'NewUser'])->name('NuevoUsuario');

// Ruta para el login
Route::get('/Login', [LoginController::class, 'index'])->name('verLogin');
Route::post('/Login', [LoginController::class, 'login'])->name('Login');

// Ruta para Gestor - Modificar datos
Route::get('/Gestor', [GestorController::class, 'index'])->name('verGestor');
Route::post('/Gestor/consulta', [GestorController::class, 'ConsultaDato'])->name('ConsultaDato');
Route::post('/Gestor/modificar', [GestorController::class, 'ModificarDato'])->name('ModificarDato');

// Ruta para Desarrollo
Route::get('/Desarrollo', [DesarrolloController::class, 'index'])->name('Desarrollo');

// Ruta para Welcome Admin
Route::get('/WelcomeAdmin', [WelocomeAdminController::class, 'WelcomeAdmin'])->name('Welcome');

// Ruta Principal
Route::get('/Principal', [PrincipalController::class, 'Principal'])->name('Principal');

// Ruta Agenda
Route::get('/Agenda', [AgendaController::class, 'Agenda'])->name('Agenda');
Route::get('/Agenda/RegistroAgenda', [AgendaController::class, 'Registro_Agenda'])->name('RegistroAgenda');
Route::post('/Agenda/Registrar_Agenda', [AgendaController::class, 'Registrar_Agenda'])->name('RegistrarAgenda');







