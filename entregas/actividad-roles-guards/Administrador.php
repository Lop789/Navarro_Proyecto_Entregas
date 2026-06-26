<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use Notifiable;

    protected $table = 'administradores';

    public $timestamps = false; // ✅ evita updated_at

    protected $fillable = [
        'correo',
        'contrasena',
        'nombre',
        'apellido',
        'telefono',
        'estado',
        'rol',
        'pic',
        'fecha_registro',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function esMaster()
    {
        return $this->rol === 'master';
    }

    public function esBase()
    {
        return $this->rol === 'base';
    }


}
