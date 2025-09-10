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
    public function BuscarAgendas(){
        
    }
}
