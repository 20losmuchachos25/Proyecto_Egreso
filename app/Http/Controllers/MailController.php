<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Livewire\Attributes\Validate;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    public function Notificar_Reserva(Request $request){

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '20losmuchachos25@gmail.com';
            $mail->Password   = 'fhpc eeyp linx cglm';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('20losmuchachos25@gmail.com', 'Los Muchachos');
            $mail->addAddress('lucassequeira.134@gmail.com');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Asunto del correo';
            $mail->Body    = '<h1>Hola!</h1><p>Este es un correo enviado con PHPMailer.</p>';
            $mail->AltBody = 'Este es un correo enviado con PHPMailer (texto plano).';

            $mail->send();
            echo 'Mensaje enviado correctamente';
        } catch (Exception $e) {
            echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
        }
    }
}
