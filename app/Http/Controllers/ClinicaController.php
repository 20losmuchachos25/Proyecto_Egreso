<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinica;
use App\Models\Telefono_Clinica;
use App\Models\Especializacion_Clinica;
use App\Models\Horario_Clinica;
use Illuminate\Support\Facades\Validator;



class ClinicaController extends Controller
{
    //Clinica
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
    //Telefono
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
                return back()->with([
                    'success' => 'Teléfono agregado correctamente.',
                    'abrir_modal' => $request->IDOculto, // o el ID que quieras pasar
                ]);            
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
    public function EditarTelefono(Request $request){
        $request->validate([
            'IDOculto2' => 'required|integer',
            'TelOculto' => 'required|integer',
            'TelefonoEdit' => 'required|integer'
        ]);
        $idClinica = $request->IDOculto2;

        $telefonoeditar = $request->TelOculto;

        $telefononuevo = $request->TelefonoEdit;

        $validar = Telefono_Clinica::where('Telefono', $telefonoeditar)->exists();

        if($validar){
            $validar2 = Telefono_Clinica::where('Telefono', $telefononuevo)->exists();
            
            if($validar2){
                return back()->with('success', 'Teléfono repetido. No se puede agregar');
            }
            else{
                $operacion = Telefono_Clinica::where('ID_Clinica', $idClinica)
                                ->where('Telefono', $telefonoeditar) // opcional: filtrar el teléfono viejo
                                ->update(['Telefono' => $telefononuevo]);

                if ($operacion) {
                    return back()->with('success', 'Teléfono actualizado correctamente.');
                } else {
                    return back()->with('error', 'Problema al actualizar el teléfono.');
                }
            }

        }else{
            return back()->with('error', 'Teléfono no existe.');
        }

    }
    //Especialización
    public function ObtenerEspecializaciones($id){
        $especializacion = Especializacion_Clinica::where('ID_Clinica', $id)->get();
        return response()->json($especializacion);
    }
    public function AgregarEspecializacion(Request $request){
        $request->validate([
            'IDOculto3' => 'required|integer',
            'Especializacion' => 'required'
        ]);
        $idClinica = $request->IDOculto3;
        $especializacion = $request->Especializacion;

        $validar = Especializacion_Clinica::where('ID_Clinica', $idClinica)->where('Especializacion', $especializacion)->exists();

        if($validar){
            return back()->with('success', 'Esta especialización ya existe para esta clinica. No se puede agregar');
        }else{
            $operacion = Especializacion_Clinica::create([
                'ID_Clinica' => $idClinica,
                'Especializacion' => $especializacion
            ]);

            if($operacion){
                return back()->with([
                    'success' => 'Especialización agregada correctamente.',
                    'abrir_modal_especializacion' => $idClinica, // o el ID que quieras pasar
                ]);            
            }
            else{
                return back()->with('error', 'Problemas al agregar especialización.');
            }

        }

    }
    public function EliminarEspecializacion(Request $request){
        $request->validate([
            'IDOculto3' => 'required|integer',
            'Especializacion' => 'required'
        ]);
        $especializacion = $request->Especializacion;
        $ID_Clinica = $request->IDOculto3;

        $validar = Especializacion_Clinica::where('Especializacion', $especializacion)->where('ID_Clinica', $ID_Clinica)->delete();

        if($validar){
            if ($validar) {
            return response()->json([
                'success' => true,
                'message' => 'Especialización eliminada correctamente.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo eliminar la especialización.'
            ]);
        }
        }else{
             return response()->json([
            'success' => false,
            'message' => 'Especialización no encontrada.'
        ]);
        }
    }
    //Horario
    public function ObtenerHorarios($id){
        $horario = Horario_Clinica::where('ID_Clinica', $id)->get();
        return response()->json($horario);
    }
    public function AgregarHorario(Request $request){
        $validator = Validator::make($request->all(), [
        'IDOculto4' => 'required|integer',
        'Dia' => 'required',
        'Apertura' => 'required|date_format:H:i',
        'Cierre' => 'required|date_format:H:i'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $idClinica = $request->IDOculto4;
        $aperturaAlta = $request->Apertura;
        $cierreAlta = $request->Cierre;

        list($h, $m) = explode(':', $aperturaAlta);
        $aperturaAlta1 = intval($h) * 60 + intval($m);

        list($h, $m) = explode(':', $cierreAlta);
        $cierreAlta1 = intval($h) * 60 + intval($m);

        $horariosExistentes = Horario_Clinica::where('ID_Clinica', $idClinica)
                                ->where('Dia', $request->Dia)
                                ->get();

        foreach ($horariosExistentes as $h) {
            list($hh, $mm) = explode(':', $h->Hora_Apertura);
            $aperturaBD = intval($hh) * 60 + intval($mm);

            list($hh, $mm) = explode(':', $h->Hora_Cierre);
            $cierreBD = intval($hh) * 60 + intval($mm);

            if ($aperturaBD < $cierreAlta1 && $aperturaAlta1 < $cierreBD) {
                return response()->json([
                    'success' => false,
                    'mensaje' => 'El horario se solapa con otro existente.'
                ]);
            }
        }

        Horario_Clinica::create([
            'ID_Clinica' => $idClinica,
            'Dia' => $request->Dia,
            'Hora_Apertura' => $aperturaAlta,
            'Hora_Cierre' => $cierreAlta
        ]);

        return response()->json([
            'success' => true,
            'mensaje' => 'Horario agregado correctamente.'
        ]);
    }
    public function EliminarHorario(Request $request){
        $request->validate([
            'IDOculto4' => 'required|integer',
            'Dia' => 'required',
            'Apertura' => 'required',
            'Cierre' => 'required',
        ]);
        $Dia = $request->Dia;
        $Apertura = $request->Apertura;
        $Cierre = $request->Cierre;
        $ID_Clinica = $request->IDOculto4;

        $validar = Horario_Clinica::where('Dia', $Dia)->where('Hora_Apertura', $Apertura)->where('Hora_Cierre', $Cierre)->where('ID_Clinica', $ID_Clinica)->delete();

        if($validar){
            if ($validar) {
            return response()->json([
                'success' => true,
                'message' => 'Horario eliminado correctamente.'
            ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No se pudo eliminar el horario.'
                ]);
            }
        }else{
             return response()->json([
            'success' => false,
            'message' => 'Horario no encontrada.'
        ]);
        }
    }
}
