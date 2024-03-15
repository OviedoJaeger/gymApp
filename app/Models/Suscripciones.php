<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    use HasFactory;
    protected $fillable = ['paquete', 'costo', 'duracion'];
    protected $table = 'paquetes'; //Nos sirve para poder gestionar una tabla con nombre diferente
    //public $timestamps = false; //Nos sirve para que no se guarden los campos de creación y actualización

}
