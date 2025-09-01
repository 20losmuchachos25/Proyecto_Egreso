<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login'); // Apunta a resources/views/Login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'Documento' => 'required|integer',
            'Password' => 'required|string',
        ]);

        $user = Usuario::where('Documento', $credentials['Documento'])->first();

        if ($user && password_verify($credentials['Password'], $user->Password)) {
            $tipo = $user->tipo_usuario;

            switch ($tipo) {
                case 'Cliente':
                    return redirect()->route('Desarrollo');
                case 'Funcionario':
                    return redirect()->route('Welcome');
                case 'Administrativo':
                    return redirect()->route('Welcome');
                default:
                    return back()->withErrors(['Documento' => 'No se pudo determinar el tipo de usuario.']);

            }
        } else {
            // Autenticación fallida
            return back()->withErrors(['Documento' => 'Credenciales inválidas.'])->withInput();
        }
    }

}
