<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $table = 'tratamiento';
    protected $primaryKey = 'Nombre';
    public $incrementing = false;        // Porque Documento no es auto-incremental
    protected $keyType = 'string';

    protected $fillable = [
        'Nombre', 'Descripcion', 'Duracion'
    ];
}
