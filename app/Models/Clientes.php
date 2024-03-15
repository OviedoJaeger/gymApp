<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'foto', 'correo', 'sexo', 'fecha_cumple',
        'telefono', 'telefono_emergencia', 'direccion', 'paquete', 'edad', 'observaciones'];
    

    public function asistencias()
    {
        return $this->hasMany(Asistencias::class, 'id_cliente');
    }
}
