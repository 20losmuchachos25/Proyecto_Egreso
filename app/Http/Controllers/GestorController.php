<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class GestorController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with(['cliente', 'funcionario', 'administrativo'])->get();
        

        return view('Gestor', compact('usuarios')); // Apunta a resources/views/Gestro.blade.php
    }
    public function ConsultaDato(Request $request)
    {
        $documento = $request->input('id');
        $campo = $request->input('dato');
        
        $usuario = Usuario::where('Documento', $documento)->first();

        if ($usuario) {
            return response()->json([
                'success' => true,
                'data' => [
                    $campo => $usuario->$campo
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado'
            ]);
        }
    }
    public function ModificarDato(Request $request)
    {
        $documento = $request->input('id');
        $campo = $request->input('dato');
        $valor = $request->input('valor');

        $usuario = Usuario::where('Documento', $documento)->first();

        if ($usuario) {
            $usuario->$campo = $valor;
            $usuario->save();

            return response()->json([
                'success' => true,
                'message' => 'Dato modificado correctamente'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado'
            ]);
        }
    }

}
