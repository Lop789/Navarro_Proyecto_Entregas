<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'direccion',
        'correo',
        'estado',
        'contrasena',
        'pic'
    ];

    protected $hidden = [
        'contrasena',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    use HasFactory;

    protected $table = 'clientes';
    public $timestamps = false;

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }
}
