<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentasPaquetes extends Model
{
    use HasFactory;

    protected $fillable = ['id_cliente', 'fecha_inicio', 'costo', 'duracion', 'tipo_paquete', 'nombre_administrador', 'metodo_pago', 'referencia'];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'id_cliente');
    }
}
