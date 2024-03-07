<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard. 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function suscripciones()
    {
        return view('suscripciones/suscripciones');
    }

    public function socios()
    {
        return view('suscripciones/socios');
    }

    public function visitas()
    {
        return view('suscripciones/visitas');
    }

    public function crearVenta()
    {
        return view('ventas/crear-venta');
    }

    public function reporteVentas()
    {
        return view('ventas/reportes-ventas');
    }

    public function inventario()
    {
        return view('ventas/inventario');
    }

    public function configuracion()
    {
        return view('administracion/configuracion');
    }

    public function anuncios()
    {
        return view('administracion/anuncios');
    }

    public function reportesGral()
    {
        return view('administracion/reportes');
    }
    public function asistencias_socios()
    {
        return view('asistencia/asistencias_socios');
    }
    public function asistencias_visitas()
    {
        return view('asistencia/asistencias_visitas');
    }
    public function ventas_paquetes()
    {
        return view('ventas/ventas-paquetes');
    }
    public function ventas_productos()
    {
        return view('ventas/ventas-productos');
    }
}
