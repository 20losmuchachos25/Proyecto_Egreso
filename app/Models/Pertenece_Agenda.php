<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertenece_Agenda extends Model
{
    protected $table = 'pertenece_agenda';
    protected $primaryKey = 'id_agenda';
    public $incrementing = false;
    public $timestamps = false; 
    protected $keyType = 'int';

    protected $fillable = [
        'id_clin'
    ];
}
