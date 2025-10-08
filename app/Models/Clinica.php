<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $table='clinica';
    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable = [
        'Direccion'
    ];
}
