<?php

namespace App\Http\Controllers\suscripciones;

use App\Http\Controllers\Controller;
use App\Models\Suscripciones;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\suscripciones\SuscripcionesDataTable;


class SuscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SuscripcionesDataTable $dataTable)
    {
        return $dataTable->render('suscripciones.suscripciones');
    }

    public function getPaquetes() {
        $paquetes = Suscripciones::all();
        return response()->json($paquetes);
    }

    public function paqueteVisita() {
        $visita = Suscripciones::whereRaw('LOWER(paquete) = ?', 'visita')->first();
        return response()->json($visita);
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
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'paquete' => 'required',
            'costo' => 'required',
            'duracion' =>'required'
        ]);

        $suscripcion = new Suscripciones($request->all());

        $suscripcion->save();
        return redirect()->route('suscripciones.index')->with('success', 'Paquete creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        //$suscripcion = Suscripciones::find($id); Esta funcion busca por defecto el campo "id" de la tabla, si se quiere buscar un campo con nombre diferente, se debe usar la linea de abajo
        $suscripcion = Suscripciones::where('id', $id)->first();
        
        return response()->json($suscripcion);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suscripciones $suscripciones)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'paqueteEditar' => 'required',
            'costoEditar' => 'required',
            'duracionEditar' =>'required'
        ]);
        
        $suscripcion = Suscripciones::where('id', $id)->first();

        $suscripcion->paquete = $request->input('paqueteEditar');
        $suscripcion->costo = $request->input('costoEditar');
        $suscripcion->duracion = $request->input('duracionEditar');

        $suscripcion->save($request->except('_token', '_method'));

        return redirect()->route('suscripciones.index')->with('success', 'Paquete Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suscripcion = Suscripciones::where('id', $id);
        $suscripcion->delete();
        return redirect()->route('suscripciones.index')->with('success', 'Paquete Eliminado correctamente');
    }
}
