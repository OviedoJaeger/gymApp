<?php

namespace App\Http\Controllers\suscripciones;

use App\Http\Controllers\Controller;
use App\Models\ClientesVisitas;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\DataTables\suscripciones\VisitasDataTable;

class VisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VisitasDataTable $dataTable)
    {
        //$visitas = ClientesVisitas::latest()->paginate(10);
        //return view('suscripciones.visitas', ['visitas' => $visitas]);
        return $dataTable->render('suscripciones.visitas');
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
    public function store(Request $request):RedirectResponse
    {

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'domicilio' =>'required',
            'telefono' => 'required'
        ]);

        clientesvisitas::create($request->all());

        $visitas = new ClientesVisitas($request->all());

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = 'images/img-visitas/';
            $nombreArchivo = $request->nombre . '-' . $request->apellido . '-' . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $nombreArchivo);

            $visitas->foto = $destinationPath . $nombreArchivo;
        }
        
        $visitas->save();

        return redirect()->route('Clientes_Visitas.index')->with('success', 'Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clientes_visita = ClientesVisitas::where('id', $id)->first();

        return response()->json($clientes_visita);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientesVisitas $clientes_Visitas)
    {
        //
    }

    public function updateVisita(Request $request, $id)
    {
        $clientes_Visita = ClientesVisitas::find($id);
        $clientes_Visita->touch();
        return response(null, 204);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nombreEditar' => 'required',
            'apellidoEditar' => 'required',
            'domicilioEditar' =>'required'
        ]);
        
        
        $clientes_Visita = ClientesVisitas::where('id', $id)->first();

        if($request->hasfile('fotoEditar')){

            $file = $request->file('fotoEditar');
            $destinationPath = 'images/img-visitas/';
            $nombreArchivo = $request->nombreEditar . '-' . $request->apellidoEditar . '-' . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $request->file('fotoEditar')->move($destinationPath, $nombreArchivo);
            $clientes_Visita->foto = $destinationPath . $nombreArchivo;

        }

        $clientes_Visita->nombre = $request->input('nombreEditar');
        $clientes_Visita->apellido = $request->input('apellidoEditar');
        $clientes_Visita->direccion = $request->input('direccionEditar');
        $clientes_Visita->telefono = $request->input('telefonoEditar');
        $clientes_Visita->foto = $request->input('fotoEditar');


        $clientes_Visita->update($request->except('_token', '_method'));
        return redirect()->route('Clientes_Visitas.index')->with('success', 'Socio Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $visita = ClientesVisitas::where('id', $id)->get();
        return redirect()->route('visitas.index')->with('success', 'Visita eliminada');
    }
}
