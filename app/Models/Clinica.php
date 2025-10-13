<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $table='clinica';
    protected $primaryKey='ID_Clinica';
    public $timestamps=false;

    protected $fillable = [
        'Direccion'
    ];
}
