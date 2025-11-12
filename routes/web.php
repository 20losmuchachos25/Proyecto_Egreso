<?php

use App\Http\Controllers\DesarrolloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\WelocomeAdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClinicaController;
use App\Http\Controllers\TelegramController;


// Ruta Principal
Route::get('/Principal', [PrincipalController::class, 'Principal'])->name('Principal');
Route::get('/telegram/enviar', [TelegramController::class, 'enviarMensaje'])->name('Enviar');
Route::post('/telegram/webhook', [TelegramController::class, 'webhook']);




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

    Route::get('/Clinica', [ClinicaController::class, 'ViewClinica'])->name('Clinica');
    Route::post('/Clinica/Alta', [ClinicaController::class, 'AgregarClinica'])->name('AltaClinica');
    Route::post('/Clinica/Editar', [ClinicaController::class, 'EditarClinica'])->name('EditarClinica');
    // Teléfonos Clinica
    Route::get('/clinicas/{id}/telefonos', [ClinicaController::class, 'ObtenerTelefonos']);
    Route::post('/Clinica/AltaTel', [ClinicaController::class, 'AgregarTelefono'])->name('AltaTelefono');
    Route::delete('/Clinica/{id}/Telefono/{telefono}', [ClinicaController::class, 'EliminarTelefono'])->name('BajaTelefono');
    Route::post('/Clinica/Telefono/Editar', [ClinicaController::class, 'EditarTelefono'])->name('EditarTelefono');
    // Especializaciones Clinica
    Route::get('/clinicas/{id}/especializaciones', [ClinicaController::class, 'ObtenerEspecializaciones']);
    Route::get('/clinica/especializaciones/json', function () { 
        $path = storage_path('app/data/especializaciones.json'); 
        $json = file_get_contents($path);
        return response()->json(json_decode($json, true));
    });
    Route::post('clinica/especializacion/Alta', [ClinicaController::class, 'AgregarEspecializacion'])->name('AltaEspecializacion');
    Route::delete('/clinica/{id}/Especializacion/{telefono}', [ClinicaController::class, 'EliminarEspecializacion'])->name('BajaEspecializacion');
    //Horario Clinica
    Route::get('/clinicas/{id}/horarios', [ClinicaController::class, 'ObtenerHorarios']);
    Route::post('/clinicas/horario/Alta', [ClinicaController::class, 'AgregarHorario'])->name('AltaHorario');
    Route::delete('/clinica/{id}/{dia}/{apertura}/{cierre}/horario/Eliminar', [ClinicaController::class, 'EliminarHorario'])->name('EliminarHorario');
    

});