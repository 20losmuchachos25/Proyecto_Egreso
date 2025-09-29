<?php

use App\Http\Controllers\DesarrolloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\WelocomeAdminController;
use App\Http\Controllers\AgendaController;

// Ruta Principal
Route::get('/Principal', [PrincipalController::class, 'Principal'])->name('Principal');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('WelcomeAdmin');
    })->name('dashboard');

    // Rutas protegidas
    
    // Regitro para registrar usuarios 
    Route::get('/Registro', [RegistroController::class, 'index'])->name('verRegistro'); 
    Route::post('/Registro', [RegistroController::class, 'NewUser'])->name('NuevoUsuario');

    Route::get('/Gestor', [GestorController::class, 'index'])->name('verGestor');
    Route::post('/Gestor/consulta', [GestorController::class, 'ConsultaDato'])->name('ConsultaDato');
    Route::post('/Gestor/modificar', [GestorController::class, 'ModificarDato'])->name('ModificarDato');

    Route::get('/Desarrollo', [DesarrolloController::class, 'index'])->name('Desarrollo');

    Route::get('/WelcomeAdmin', [WelocomeAdminController::class, 'WelcomeAdmin'])->name('Welcome');

    Route::get('/Agenda', [AgendaController::class, 'Agenda'])->name('Agenda');
    Route::get('/Agenda/RegistroAgenda', [AgendaController::class, 'Registro_Agenda'])->name('RegistroAgenda');
    Route::post('/Agenda/Registrar_Agenda', [AgendaController::class, 'Registrar_Agenda'])->name('RegistrarAgenda');
    Route::get('/Agenda/VerAgenda', [AgendaController::class, 'Buscar_Agenda'])->name('VerAgenda');
    Route::post('/Agenda/ModificarAgenda', [AgendaController::class, 'Modificar_Agenda'])->name('ModificarAgenda');

});