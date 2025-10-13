<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefono_Clinica extends Model
{
    protected $table = 'telefono_clinica';
    protected $primaryKey = 'ID_Clinica';
    public $incrementing = false;
    public $timestamps = false; 
    protected $keyType = 'int';

    protected $fillable = [
        'ID_Clinica',
        'Telefono'
    ];
}
