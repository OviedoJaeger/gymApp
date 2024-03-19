<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciasVisitas extends Model
{
    use HasFactory;

    public function clientesVisitas()
    {
        return $this->belongsTo(ClientesVisitas::class, 'id_visita');
    }
}
