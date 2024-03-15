<?php

namespace App\Http\Controllers\asistencia;

use App\Http\Controllers\Controller;
use App\Models\Asistencias;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Clientes;

class AsistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $asistencias = Asistencias::with('cliente')->latest()->get();
        return view('asistencia.asistencias_socios',['asistencias' => $asistencias]);

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
        $asistencias = Asistencias::where('id', $id)->first();
        
        return response()->json($asistencias);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencias $asistencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencias $asistencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencias $asistencias)
    {
        //
    }
}
