<?php

namespace App\Http\Controllers\suscripciones;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $clientes = clientes::latest()->get();
        return view('suscripciones.socios', ['clientes' => $clientes]);
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
            'telefono_emergencia' =>'required',
            'correo' =>'required',
            'sexo' =>'required',
            'fecha_cumple' =>'required'
        ]);
        
        $imageData = $request->input('hiddenImage');
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $image = base64_decode($imageData);
        $imageName = 'image_' . time() . '.png';
        Storage::disk('public')->put('images/img-socios/' . $imageName, $image);
        $imageUrl = Storage::url($imageName);

        $request['foto'] = $imageUrl;
    
        Clientes::create($request->all());
        return redirect()->route('socios.index')->with('success', 'Socio creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = clientes::where('id', $id)->first();
        //dd($cliente);
        return response()->json($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono_emergencia' =>'required',
            'correo' =>'required',
            'sexo' =>'required',
            'fecha_cumple' =>'required'
        ]);
        
        $cliente = clientes::where('id', $id);
        $cliente->update($request->except('_token', '_method'));
        return redirect()->route('socios.index')->with('success', 'Socio Editado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = clientes::where('id', $id)->get();
        $cliente->delete();
        return redirect()->route('socios.index')->with('success', 'Socio Eliminado correctamente');
    }
}
