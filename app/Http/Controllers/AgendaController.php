<?php

namespace App\Http\Controllers;
use App\Models\Agenda;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function Agenda(){
        $agendas = Agenda::with(['cliente', 'usuario'])->get();        
        return view('Agenda', compact('agendas'));    
    }

    public function Registro_Agenda(){
        return view('Registro_Agenda');
    }

    public function BuscarAgendas(){
        // Todas las agendas de una misma persona
    }

    public function Registrar_Agenda(Request $request){
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

    public function Buscar_Agenda(Request $request){
        $id = $request->query('id');

        $agenda = Agenda::with('usuario')->findOrFail($id);
        $tratamientos = Tratamiento::all();
        
        return view('DetalleAgenda', compact('agenda','tratamientos'));
    }

    public function Modificar_Agenda(Request $request){
        $request->validate([
            'id' => 'required|integer',
            'Motivo' => 'required|string',
            'Fecha' => 'required|date',
            'Hora' => 'required|date_format:H:i',
            'Tratamientos' => 'nullable|string'
        ]);

        $agenda = Agenda::findOrFail($request->id);

        if ($request->Tratamientos == 'Seleccionar...') {
            $agenda->Motivo = $request->Motivo;
            $agenda->Fecha = $request->Fecha;
            $agenda->Hora = $request->Hora;
        }
        else{
            $agenda->Motivo = $request->Motivo . ' (' . $request->Tratamientos . ')';
            $agenda->Fecha = $request->Fecha;
            $agenda->Hora = $request->Hora;
        }
        $agenda->save();
        return redirect()->route('Agenda');



    }
}
