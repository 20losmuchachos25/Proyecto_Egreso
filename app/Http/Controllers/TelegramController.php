<?php

namespace App\Http\Controllers;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Http;
use App\Models\Usuario;



use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function enviarMensaje(Request $request)
    {
        $request->validate([
            'Documento' => 'required',
        ]);

        $documento = $request->input('Documento');
        $usuario = Usuario::where('Documento', $documento)->first();

        if ($usuario) {
            $token = env('TELEGRAM_BOT_TOKEN');

            $chatId = $usuario->id_telegram; // ESTE ES EL BUENO

            $texto = 'Hola ' . $usuario->Primer_Nombre . ', este mensaje viene desde Dental Sense 😁. Se ha cambiado el estado de tu cita del día ';

            $response = Http::withOptions([
                'verify' => base_path('certs/cacert.pem'),
            ])->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chatId, // USAR SIEMPRE id_telegram
                'text'   => $texto,
            ]);

            if ($response->successful()) {
                return "Mensaje enviado correctamente ✅";
            } else {
                return "Error al enviar: " . $response->body();
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado'
            ]);
        }
    }


    public function webhook(Request $request)
    {
        $update = $request->all();

        if (isset($update['message'])) {
            $chatId = $update['message']['chat']['id'];
            $texto = strtolower(trim($update['message']['text'] ?? ''));

            if ($texto === '/start' || $texto === 'hola') {
                $respuesta = "👋 Hola {$update['message']['from']['first_name']}! Soy el bot de Dental Sense 🦷";
            } else {
                $respuesta = "Recibí tu mensaje: \"$texto\" $chatId ✅";
            }

            $token = env('TELEGRAM_BOT_TOKEN');

            Http::withOptions([
                'verify' => base_path('certs/cacert.pem'),
            ])->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $respuesta,
            ]);
        }

        return response()->json(['ok' => true]);
    }

}
