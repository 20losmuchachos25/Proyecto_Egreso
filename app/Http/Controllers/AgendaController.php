<?php

namespace App\Http\Controllers;
use App\Models\Agenda;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function Agenda()
    {
        $agendas = Agenda::with(['cliente', 'usuario'])->get();        
        return view('Agenda', compact('agendas'));    
    }

    public function Registro_Agenda()
    {
        return view('Registro_Agenda');
    }

    public function BuscarAgendas(){
        
    }

    public function Registrar_Agenda(Request $request)
    {
        $request->validate([
            'Fecha' => 'required|date',
            'Hora' => 'required|date_format:H:i',
            'Motivo' => 'nullable|string'
        ]);

        $datos = $request->all();
        $datos['Doc_Cliente'] = session('Documento');

        if (Agenda::create($datos)) {
            return back()->with('success', 'Agenda creada correctamente.');

        } else {
            return response()->json(['message' => 'Upss!!!'], 500);
        }   
    }
}
