<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesVisitas extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'foto', 'telefono',
    'direccion', 'paquete', 'edad', 'observaciones', 'paquetes_renovados',
    'adeudo'];

    public function asistenciasVisitas()
    {
        return $this->hasMany(AsistenciasVisitas::class, 'id_visita');
    }
}
