<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    protected $table = 'administrativo';   // Nombre de la tabla
    protected $primaryKey = 'Documento_Administrativo'; // Clave primaria
    public $incrementing = false;        // Porque Documento no es auto-incremental
    protected $keyType = 'int';
    public $timestamps = false;


    protected $fillable = [
        'Documento_Administrativo',   
    ];  
}
