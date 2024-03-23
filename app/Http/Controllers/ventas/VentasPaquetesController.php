<?php

namespace App\Http\Controllers\ventas;

use App\DataTables\ventas\VentasPaquetesDataTable;
use App\Http\Controllers\Controller;
use App\Models\VentasPaquetes;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class VentasPaquetesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VentasPaquetesDataTable $dataTable)
    {
        return $dataTable->render('ventas.ventas-paquetes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'tipo_paquete' => 'required',
            'costo' => 'required',
            'metodo_pago' =>'required',
            'duracion' =>'required',
            'fecha_inicio' =>'required',
            'nombre_administrador' =>'required',
            'id_cliente' =>'required'
        ]);

        $ventaPaquete = new VentasPaquetes($request->all());

        $ventaPaquete->save();
        
        return response(null, 204);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ventasPaquetes = VentasPaquetes::where('id', $id)->first();

        return response()->json($ventasPaquetes);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VentasPaquetes $ventasPaquetes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VentasPaquetes $ventasPaquetes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $locker = VentasPaquetes::where('id', $id);
        $locker->delete();
        return redirect()->route('ventas-paquetes.index')->with('success', 'Paquete eliminado correctamente');
    }
}
