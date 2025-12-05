<?php

namespace App\Http\Controllers;
use App\Models\Agenda;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use App\Models\Pertenece_Agenda;
use App\Models\Funcionario;
use App\Http\Controllers\MailController;

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
        $agenda = Agenda::findOrFail($request->id);
        $agenda->Motivo = $request->Motivo;
        $agenda->Fecha = $request->Fecha;
        $agenda->Hora = $request->Hora;
        $agenda->Estado_Cita = $request->Estado_Cita;
        $agenda->Duracion = $request->Duracion ?? $agenda->Duracion;
        $agenda->Tratamiento = $request->Tratamiento ?? $agenda->Tratamiento;


        $agenda->save();

        if($request->Estado_Cita == 'Declinado'){
            Pertenece_Agenda::where('id_agenda', $request->id)
                ->where('id_clin', $request->ID_Clinica)->delete();

            $mailController = new MailController();
            return $mailController->Notificar_Reserva($request);

            return back()->withErrors(['Cita declinada.'])->withInput();
            return redirect()->route('Agenda');
        }
        elseif($request->Estado_Cita == 'Cancelado'){
            Pertenece_Agenda::where('id_agenda', $request->id)
                ->where('id_clin', $request->ID_Clinica)->delete();

            $mailController = new MailController();
            return $mailController->Notificar_Reserva($request);

            return back()->withErrors(['Cita cancelada.'])->withInput();
            return redirect()->route('Agenda');
        }
        else{
            if (!empty($request->ID_Clinica)) {
                $existe = Pertenece_Agenda::where('id_agenda', $request->id)
                ->where('id_clin', $request->ID_Clinica)
                ->exists();

                if ($existe) {
                    return back()->withErrors(['Esta agenda ya está asociada a esa clínica.'])->withInput();
                }

                Pertenece_Agenda::create([
                    'id_agenda' => $request->id,
                    'id_clin'   => $request->ID_Clinica
                ]);
            }
        }

        $mailController = new MailController();
        return $mailController->Notificar_Reserva($request);
        return redirect()->route('Agenda');
    }

    //Medico
    public function Buscar_Agendas_Clinica_Medico(){
        $documento = session('Documento');

        // 1. Clínicas donde trabaja el funcionario
        $clinicas = Funcionario::findOrFail($documento)
                    ->clinicas()
                    ->pluck('clinica.ID_Clinica');

        // 2. Traer las agendas asociadas a esas clínicas mediante JOIN
        $agendas = Agenda::join('pertenece_agenda', 'agenda.id', '=', 'pertenece_agenda.id_agenda')
            ->whereIn('pertenece_agenda.id_clin', $clinicas)
            ->where('agenda.Estado_Cita', '<>', 'DECLINADO')   // ← condición extra
            ->select('agenda.*')
            ->get();

        return view('AgendasClinicas', compact('agendas'));
    }
}
