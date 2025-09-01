<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;


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




