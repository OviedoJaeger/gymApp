<?php

use App\Http\Controllers\asistencia\AsistenciasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\suscripciones\SuscripcionesController;
use App\Http\Controllers\suscripciones\ClientesController;
use App\Http\Controllers\suscripciones\LockersController;
use App\Http\Controllers\suscripciones\VisitasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes(['register' => false]);

//Sección de rutas para "Suscripciones"
Route::resource('suscripciones', SuscripcionesController::class);
Route::get('getPaquetes', [SuscripcionesController::class, 'getPaquetes']);

//Sección de rutas para "Socios"
Route::resource('socios', ClientesController::class);


//Sección de rutas para "Visitas"
Route::resource('visitas', VisitasController::class);

//Sección de rutas para "Ventas"


//Sección de rutas para "lockers"
Route::resource('lockers', LockersController::class);

//Sección de rutas para "Anuncios"


//Sección de rutas para "Reportes"


//Sección de rutas para "Configuración"


//Sección de rutas para "Inventario"

//Seccion de rutas para "Asistencia Socios"
Route::resource('asistencias-socios', AsistenciasController::class);



Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/visitas', [App\Http\Controllers\HomeController::class, 'visitas'])->name('visitas');
Route::get('/crear-venta', [App\Http\Controllers\HomeController::class, 'crearVenta'])->name('crear-venta');
Route::get('/reportes-ventas', [App\Http\Controllers\HomeController::class, 'reporteVentas'])->name('reporte-venta');
Route::get('/inventario', [App\Http\Controllers\HomeController::class, 'inventario'])->name('inventario');
Route::get('/configuracion', [App\Http\Controllers\HomeController::class, 'configuracion'])->name('configuracion');
Route::get('/anuncios', [App\Http\Controllers\HomeController::class, 'anuncios'])->name('anuncios');
Route::get('/reportes', [App\Http\Controllers\HomeController::class, 'reportesGral'])->name('reportes-gral');
Route::get('/inventario', [App\Http\Controllers\HomeController::class, 'inventario'])->name('inventario');
Route::get('/ventas-paquetes', [App\Http\Controllers\HomeController::class, 'ventas_paquetes'])->name('ventas_paquetes');
Route::get('/ventas-productos', [App\Http\Controllers\HomeController::class, 'ventas_productos'])->name('ventas_productos');
Route::get('/ventana-cliente', [App\Http\Controllers\HomeController::class, 'ventana_cliente'])->name('ventana_cliente');