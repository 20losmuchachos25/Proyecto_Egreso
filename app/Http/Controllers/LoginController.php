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
            // Autenticación exitosa
            // Aquí puedes iniciar sesión y redirigir al usuario según su rol
            return redirect()->route('verRegistro'); // Cambia 'dashboard' por la ruta deseada
        } else {
            // Autenticación fallida
            return back()->withErrors(['Documento' => 'Credenciales inválidas.'])->withInput();
        }
    }

}
