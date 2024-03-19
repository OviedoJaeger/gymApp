<?php

namespace App\Http\Controllers\asistencia;

use App\Http\Controllers\Controller;
use App\Models\AsistenciasVisitas;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ClientesVisitas;

class AsistenciaVisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $asistenciasVisitas = AsistenciasVisitas::latest()->get();
        return view('asistencia.asistencias_visitas', ['asistenciasVisitas' => $asistenciasVisitas]);
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
        $asistenciasVisitas = AsistenciasVisitas::where('id', $id)->first();
        
        return response()->json($asistenciasVisitas);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsistenciasVisitas $asistenciasVisitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsistenciasVisitas $asistenciasVisitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsistenciasVisitas $asistenciasVisitas)
    {
        //
    }
}
