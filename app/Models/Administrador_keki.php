<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'estado',
        'contrasena',
        'pic'
    ];

    public $timestamps = true;
    const CREATED_AT = 'fecha_registro';
    const UPDATED_AT = null;
    protected $table = 'administradores';
}
