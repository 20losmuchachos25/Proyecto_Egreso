<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table='agenda';
    protected $primaryKey='id';
    public $timestamps = false;

    
    protected $fillable = [
        'Doc_Cliente','Fecha','Hora','Duracion','Estado_Cita'
    ];

    protected $attributes = [
        'Estado_Cita' => 'Pendiente de confirmación', // Valor por defecto en el modelo
        'Duracion' => 0,
    ];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Doc_Cliente', 'Documento_Cliente');
    }

    // (Opcional) Relación con Usuario si también necesitás datos del usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Doc_Cliente', 'Documento');
    }
}
