<?php

namespace App\Http\Controllers\ventas;

use App\DataTables\ventas\VentasPaquetesDataTable;
use App\Http\Controllers\Controller;
use App\Models\VentasPaquetes;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        //
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
    public function destroy(VentasPaquetes $ventasPaquetes)
    {
        //
    }
}
