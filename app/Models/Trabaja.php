<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabaja extends Model
{
    protected $table = 'trabaja';   // Nombre de la tabla
    protected $primaryKey = 'Doc_Funcionario'; // Clave primaria
    public $incrementing = false;        // Porque Documento no es auto-incremental
    protected $keyType = 'int';
    public $timestamps = false;


    protected $fillable = [
        'Doc_Funcionario',
        'ID_Clinica'
    ];
}
