<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinica;
use App\Models\Telefono_Clinica;


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

    public function ObtenerTelefonos($id){
        $telefonos = Telefono_Clinica::where('ID_Clinica', $id)->get();
        return response()->json($telefonos);
    }

    public function AgregarTelefono(Request $request){
        $request->validate([
            'IDOculto' => 'required|integer',
            'Telefono' => 'required|min:6'
        ]);
        $telefono = $request->Telefono;

        $validar = Telefono_Clinica::where('Telefono', $telefono)->exists();

        if($validar){
            return back()->with('success', 'Teléfono repetido. No se puede agregar');
        }else{
            $operacion = Telefono_Clinica::create([
                'ID_Clinica' => $request->IDOculto,
                'Telefono' => $telefono
            ]);

            if($operacion){
                return back()->with('success', 'Telefono agregado correctamente.');
            }
            else{
                return back()->with('error', 'Problemas al agregar telefono.');
            }

        }

    }
    public function EliminarTelefono(Request $request){
        $request->validate([
            'IDOculto' => 'required|integer',
            'Telefono' => 'required'
        ]);
        $telefono = $request->Telefono;
        $ID_Clinica = $request->IDOculto;

        $validar = Telefono_Clinica::where('Telefono', $telefono)->where('ID_Clinica', $ID_Clinica)->delete();

        if($validar){
            if ($validar) {
            return response()->json([
                'success' => true,
                'message' => 'Teléfono eliminado correctamente.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo eliminar el teléfono.'
            ]);
        }
        }else{
             return response()->json([
            'success' => false,
            'message' => 'Teléfono no encontrado.'
        ]);
        }
    }
}
