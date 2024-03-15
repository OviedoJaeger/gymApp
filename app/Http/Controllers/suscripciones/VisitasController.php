<?php

namespace App\Http\Controllers\suscripciones;

use App\Http\Controllers\Controller;
use App\Models\ClientesVisitas;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class VisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $visitas = ClientesVisitas::latest()->get();
        return view('suscripciones.visitas', ['visitas' => $visitas]);
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
            'domicilio' =>'required'
        ]);

        clientesvisitas::create($request->all());
        return redirect()->route('Clientes_Visitas.index')->with('success', 'Socio creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientesVisitas $clientes_visitas)
    {
        $clientes_visita = ClientesVisitas::find($clientes_visitas);

        return response()->json($clientes_visita);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientesVisitas $clientes_Visitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientesVisitas $clientes_Visitas): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'domicilio' =>'required'
        ]);
        
        $clientes_Visita = clientesvisitas::find($clientes_Visitas);
        $clientes_Visita->update($request->except('_token', '_method'));
        return redirect()->route('Clientes_Visitas.index')->with('success', 'Socio Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }
}
