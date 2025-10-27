<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especializacion_Clinica extends Model
{
    protected $table = 'especializacion_clinica';
    protected $primaryKey = 'ID_Clinica';
    public $incrementing = false;
    public $timestamps = false; 
    protected $keyType = 'int';

    protected $fillable = [
        'ID_Clinica',
        'Especializacion'
    ];
}
