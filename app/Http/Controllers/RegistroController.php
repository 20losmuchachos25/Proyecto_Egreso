<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Administrativo;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        return view('Registro'); // Apunta a resources/views/Gestro.blade.php
    }


    public function NewUser(Request $request){
        $request->validate([
            'Documento' => 'required|unique:usuario,Documento',
            'Tipo_Documento'    => 'required|min:2|max:10',
            'Primer_Nombre'    => 'required|min:3',
            'Segundo_Nombre'   => 'nullable|min:3',
            'Primer_Apellido'  => 'required|min:3',
            'Segundo_Apellido' => 'nullable|min:3',
            'Edad'             => 'required|integer|min:0',
            'Fecha_Nacimiento' => 'required|date',
            'Sexo' => 'required|in:Masculino,Femenino,X',
            'Rol'              => 'required|string|max:50',
            'Mutualista'       => 'nullable|string|max:100',
            'Celular'          => 'nullable|digits_between:8,12',
            'Email'    => 'required|email|unique:usuario,Email',
        ]);

        $datos = $request->all();
        $datos['Password'] = bcrypt($datos['Documento']); // Encriptar la contraseña

        $rol = $datos['Rol'];

        if ($rol === 'Cliente') {
            Usuario::create($datos);
            Cliente::create(['Documento_Cliente' => $datos['Documento']]);
        } elseif ($rol === 'Funcionario') {
            Usuario::create($datos);
            Funcionario::create(['Documento_Funcionario' => $datos['Documento']]);
        } elseif ($rol === 'Administrativo') {
            Usuario::create($datos);
            Administrativo::create(['Documento_Administrativo' => $datos['Documento']]);
        } else {
            return back()->with('error', 'Rol no válido seleccionado.');
        }
        return back()->with('success', 'Usuario creado correctamente.');
    }

}
