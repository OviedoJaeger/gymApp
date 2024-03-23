<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentasProductos extends Model
{
    use HasFactory;

    protected $fillable = ['codigo_venta', 'productos_vendidos', 'total',
    'turno', 'cambio', 'nombre_administrador', 'metodo_pago', 'pago_con'];
}
