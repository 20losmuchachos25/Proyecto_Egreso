<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinica;

class ClinicaController extends Controller
{
    public function ViewClinica(){
        $clinicas = Clinica::all();

        return view('Clinica', compact('clinicas'));
    }

    public function AgregarClinica(Request $request){
        $request->validate([
            'Calle' => 'required|min:2',
            'Numero' => 'required|integer|min:0',
            'Esquina' =>'nullable',
            'Referencia' => 'nullable'
        ]);


        $direccion = $request->Calle . " " . $request->Numero . " esq " . $request->Esquina . ". Referencia: " . $request->Referencia;

        $clinica = Clinica::create([
                'Direccion' => $direccion
            ]);

        if($clinica){
            return back()->with('success', 'Clinica agregada correctamente.');
        }
        else{
            return back()->with('error', 'Problemas al agregar clinica.');
        }
    }
    
    public function EditarClinica(Request $request){
        $request->validate([
            'ID' => 'required',
            'Calle' => 'required|min:2',
            'Numero' => 'required|integer|min:0',
            'Esquina' =>'nullable',
            'Referencia' => 'nullable'
        ]);
        $ID = $request->ID;
        $direccion = $request->Calle . " " . $request->Numero . " esq " . $request->Esquina . " Referencia: " . $request->Referencia;

        $clinica = Clinica::where('ID_Clinica', $ID)->first();

        if ($clinica) {
            $clinica->Direccion = $direccion;
            $clinica->save();

            return back()->with('success', 'Clinica modificada correctamente.');

        } else {
            return back()->with('error', 'Problemas al editar clinica.');

        }

    }
}
