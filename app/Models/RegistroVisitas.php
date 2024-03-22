<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroVisitas extends Model
{
    use HasFactory;


    public function clientesVisitas()
    {
        $fillable = [
            'id_visita',
            'nombre_administrador',
            'metodo_pago',
            'costo',
            'referencia'
        ];
        return $this->belongsTo(ClientesVisitas::class, 'id_visita');
    }
    
}
