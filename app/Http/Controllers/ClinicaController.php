<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClinicaController extends Controller
{
    public function ViewClinica(){
        return view('Clinica');
    }

    public function AgregarClinica(Request $request){
        $request->validate([
            'Calle' => 'required|min:2',
            'Numero' => 'required|integer|min:0',
            'Esquina' =>'nullable',
            'Referencia' => 'nullable'
        ]);

        $datos = $request->all();

        $direccion = $datos['Calle'] . $datos['Numero'] . " esq " . $datos['Esquina'] . ". Referencia: " . $datos['Referencia'];
    }
}
