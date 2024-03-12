<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\administracion\SuscripcionesController;

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

//Sección de rutas para "Socios"


//Sección de rutas para "Visitas"


//Sección de rutas para "Ventas"


//Sección de rutas para "lockers"


//Sección de rutas para "Anuncios"


//Sección de rutas para "Reportes"


//Sección de rutas para "Configuración"


//Sección de rutas para "Inventario"

Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/socios', [App\Http\Controllers\HomeController::class, 'socios'])->name('socios');
Route::get('/visitas', [App\Http\Controllers\HomeController::class, 'visitas'])->name('visitas');
Route::get('/crear-venta', [App\Http\Controllers\HomeController::class, 'crearVenta'])->name('crear-venta');
Route::get('/reportes-ventas', [App\Http\Controllers\HomeController::class, 'reporteVentas'])->name('reporte-venta');
Route::get('/inventario', [App\Http\Controllers\HomeController::class, 'inventario'])->name('inventario');
Route::get('/configuracion', [App\Http\Controllers\HomeController::class, 'configuracion'])->name('configuracion');
Route::get('/anuncios', [App\Http\Controllers\HomeController::class, 'anuncios'])->name('anuncios');
Route::get('/reportes', [App\Http\Controllers\HomeController::class, 'reportesGral'])->name('reportes-gral');
Route::get('/inventario', [App\Http\Controllers\HomeController::class, 'inventario'])->name('inventario');
Route::get('/asistencias-socios', [App\Http\Controllers\HomeController::class, 'asistencias_socios'])->name('asistencias_socios');
Route::get('/asistencias-visitas', [App\Http\Controllers\HomeController::class, 'asistencias_visitas'])->name('asistencias_Visitas');
Route::get('/ventas-paquetes', [App\Http\Controllers\HomeController::class, 'ventas_paquetes'])->name('ventas_paquetes');
Route::get('/ventas-productos', [App\Http\Controllers\HomeController::class, 'ventas_productos'])->name('ventas_productos');
Route::get('/lockers', [App\Http\Controllers\HomeController::class, 'lockers'])->name('lockers');
Route::get('/ventana-cliente', [App\Http\Controllers\HomeController::class, 'ventana_cliente'])->name('ventana_cliente');