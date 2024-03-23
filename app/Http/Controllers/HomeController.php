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


    

    public function crearVenta()
    {
        return view('ventas/crear-venta');
    }

    public function reporteVentas()
    {
        return view('ventas/reportes-ventas');
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
    
    public function ventas_productos()
    {
        return view('ventas/ventas-productos');
    }
    public function ventana_cliente()
    {
        return view('administracion/ventana_cliente', ['hideNavbar' => true], ['hideSidebar' => true]);
    }
}
