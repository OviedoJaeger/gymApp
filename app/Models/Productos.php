<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable =   ['imagen', 'codigo', 'descripcion', 'stock', 'precio_compra', 'precio_venta', 'ventas',
                            'estado_disponible'];

}
