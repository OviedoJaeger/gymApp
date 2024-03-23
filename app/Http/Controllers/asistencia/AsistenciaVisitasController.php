<?php

namespace App\Http\Controllers\asistencia;

use App\Http\Controllers\Controller;
use App\Models\AsistenciasVisitas;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\DataTables\asistencia\AsistenciasVisitasDataTable;
use App\Models\Asistencias;
use App\Models\RegistroVisitas;

class AsistenciaVisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AsistenciasVisitasDataTable $dataTable)
    {
        return $dataTable->render('asistencia.asistencias_visitas');
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
        $request->validate([
            'id_visita' => 'required',
            'costo' => 'required',
            'metodo_pago' =>'required',
            'nombre_administrador' =>'required'
        ]);

        $visita = new RegistroVisitas($request->all());

        $visita->save();
        
        return response(null, 204);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asistenciasVisitas = RegistroVisitas::where('id', $id)->first();
        
        return response()->json($asistenciasVisitas);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistroVisitas $asistenciasVisitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistroVisitas $asistenciasVisitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistroVisitas $asistenciasVisitas)
    {
        //
    }
}
