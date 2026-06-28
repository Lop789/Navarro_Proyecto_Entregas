<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{
    use HasFactory;

    protected $table = 'carrito_detalle';

    protected $fillable = [
        'carrito_id',
        'producto_id',
        'precio_unitario',
        'cantidad',
    ];

    protected $casts = [
        'carrito_id' => 'integer',
        'producto_id' => 'integer',
        'precio_unitario' => 'decimal:2',
        'cantidad' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
