<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';   // Nombre de la tabla
    protected $primaryKey = 'Documento'; // Clave primaria
    public $incrementing = false;        // Porque Documento no es auto-incremental
    protected $keyType = 'int';

    protected $fillable = [
        'Documento', 'Tipo_Documento', 'Primer_Nombre', 'Segundo_Nombre',
        'Primer_Apellido', 'Segundo_Apellido', 'Edad', 'Fecha_Nacimiento',
        'Sexo', 'Mutualista', 'Estado', 'Celular', 'Email', 'Password',   
    ];

    protected $attributes = [
        'Estado' => 'Activo', // Valor por defecto en el modelo
    ];

    // 🔹 Relación con Cliente
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'Documento_Cliente', 'Documento');
    }

    // 🔹 Relación con Funcionario
    public function funcionario()
    {
        return $this->hasOne(Funcionario::class, 'Documento_Funcionario', 'Documento');
    }

    // 🔹 Relación con Administrativo
    public function administrativo()
    {
        return $this->hasOne(Administrativo::class, 'Documento_Administrativo', 'Documento');
    }

    // 🔹 Atributo dinámico: Tipo de usuario
    public function getTipoUsuarioAttribute()
    {
        if ($this->cliente) return 'Cliente';
        if ($this->funcionario) return 'Funcionario';
        if ($this->administrativo) return 'Administrativo';
        return 'Desconocido';
    }
}
