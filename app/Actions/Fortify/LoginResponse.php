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
                return redirect()->route('RegistroAgenda');
            case 'Funcionario':
                return redirect()->route('Desarrollo');
            case 'Administrativo':
                return redirect()->route('Welcome');
            default:
                return redirect()->route('dashboard'); // fallback
        }
    }
}
