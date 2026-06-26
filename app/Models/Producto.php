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
        'estado'
    ];

    const UPDATED_AT = null;

    protected $table = 'productos_eco';
}
