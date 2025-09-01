<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';   // Nombre de la tabla
    protected $primaryKey = 'Documento_Cliente'; // Clave primaria
    public $incrementing = false;        // Porque Documento no es auto-incremental
    protected $keyType = 'int';
    public $timestamps = false;


    protected $fillable = [
        'Documento_Cliente',   
    ];
}
