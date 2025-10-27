<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario_Clinica extends Model
{
    protected $table = 'horario_clinica';
    protected $primaryKey = 'ID_Clinica';
    public $incrementing = false;
    public $timestamps = false; 
    protected $keyType = 'int';

    protected $fillable = [
        'ID_Clinica',
        'Dia',
        'Hora_Apertura',
        'Hora_Cierre'
    ];
}
