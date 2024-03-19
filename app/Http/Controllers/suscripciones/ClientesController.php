<?php

namespace App\Http\Controllers\suscripciones;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\suscripciones\ClientesDataTable;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClientesDataTable $dataTable)
    {

        return $dataTable->render('suscripciones.socios');
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
        //Obtención de la imagen y guardado en carpeta PUBLIC, guardado de ruta en la BD
        $cliente = new Clientes($request->all());

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = 'images/img-socios/';
            $nombreArchivo = $request->nombre . '-' . $request->apellido . '-' . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $nombreArchivo);

            $cliente->foto = $destinationPath . $nombreArchivo;
        }
        
        $cliente->save();
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
            'nombreEditar' => 'required', 
            'apellidoEditar' => 'required',
            'telefono_emergenciaEditar' =>'required',
            'correoEditar' =>'required',
            'fecha_cumpleEditar' =>'required'
        ]);

        $cliente = clientes::where('id', $id)->first();

        if($request->hasFile('fotoEditar')) {
            $file = $request->file('fotoEditar');
            $destinationPath = 'images/img-socios/';
            $nombreArchivo = $request->nombreEditar . '-' . $request->apellidoEditar . '-' . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $request->file('fotoEditar')->move($destinationPath, $nombreArchivo);
            $cliente->foto = $destinationPath . $nombreArchivo;
        }

        $cliente->nombre = $request->input('nombreEditar');
        $cliente->apellido = $request->input('apellidoEditar');
        $cliente->telefono = $request->input('telefonoEditar');
        $cliente->telefono_emergencia = $request->input('telefono_emergenciaEditar');
        $cliente->direccion = $request->input('direccionEditar');
        $cliente->correo = $request->input('correoEditar');
        $cliente->fecha_cumple = $request->input('fecha_cumpleEditar');
        $cliente->edad = $request->input('edadEditar');
        $cliente->observaciones = $request->input('observacionesEditar');
        
        
        $cliente->save($request->except('_token', '_method'));
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
