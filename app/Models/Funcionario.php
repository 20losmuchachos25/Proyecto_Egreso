<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';   // Nombre de la tabla
    protected $primaryKey = 'Documento_Funcionario'; // Clave primaria
    public $incrementing = false;        // Porque Documento no es auto-incremental
    protected $keyType = 'int';
    public $timestamps = false;


    protected $fillable = [
        'Documento_Funcionario'
    ];

    public function clinicas(){
        return $this->belongsToMany(
            Clinica::class,
            'trabaja',           // Nombre de la tabla pivote
            'Doc_Funcionario',   // FK en pivote que apunta a funcionario
            'ID_Clinica'         // FK en pivote que apunta a clínica
        );
    }

}
