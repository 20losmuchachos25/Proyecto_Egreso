<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        switch ($user->tipo_usuario) {
            case 'Cliente':
                session(['Documento' => $user->Documento]);
                session(['rol' => $user->tipo_usuario]);
                return redirect()->route('RegistroAgenda');
            case 'Funcionario':
                session(['Documento' => $user->Documento]);
                session(['rol' => $user->tipo_usuario]);
                return redirect()->route('WelcomeMED');
            case 'Administrativo':
                session(['Documento' => $user->Documento]);
                session(['rol' => $user->tipo_usuario]);
                return redirect()->route('Welcome');
            default:
                return redirect()->route('dashboard'); // fallback
        }
    }
}
