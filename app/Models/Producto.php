<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria',
        'descripcion',
        'ahorro_kgco2e',
        'ahorro_agua_litros',
        'precio',
        'pic1',
        'pic2',
        'pic3',
        'estado',
        'stock',
    ];

    protected $casts = [
        'ahorro_kgco2e' => 'decimal:2',
        'ahorro_agua_litros' => 'decimal:2',
        'precio' => 'decimal:2',
        'estado' => 'boolean',
        'stock' => 'integer',
        'created_at' => 'datetime',
    ];

    const UPDATED_AT = null;

    protected $table = 'productos_eco';

    public function pedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::class, 'producto_id');
    }

    public function carritoDetalles()
    {
        return $this->hasMany(CarritoDetalle::class, 'producto_id');
    }
}
