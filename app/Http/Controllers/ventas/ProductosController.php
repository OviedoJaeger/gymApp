<?php

namespace App\Http\Controllers\ventas;

use App\DataTables\ventas\ProductosDataTable;
use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //Display a listing of the resource.
    public function index(ProductosDataTable $dataTable)
    {
        return $dataTable->render('ventas.inventario');
    }

    //Show the form for creating a new resource.
    public function create()
    {
    }

    //Store a newly created resource in storage.
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'codigo' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio_compra' =>'required',
            'precio_venta' =>'required'
        ]);
        //Obtención de la imagen y guardado en carpeta PUBLIC, guardado de ruta en la BD
        $productos = new Productos($request->all());

        if($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'images/img-productos/';
            $nombreArchivo = $request->nombre . '-' . $request->apellido . '-' . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $nombreArchivo);

            $productos->foto = $destinationPath . $nombreArchivo;
        }
        
        $productos->save();
        return redirect()->route('inventario.index')->with('success', 'Producto creado correctamente');
    }

    //Display the specified resource.
    public function show($id)
    {
        $producto = Productos::where('id', $id)->first();
        return response()->json($producto);
    }

    //Show the form for editing the specified resource.
    public function edit(Productos $productos)
    {
        //
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([       
            'codigo' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio_compra' =>'required',
            'precio_venta' =>'required'     
        ]);

        $producto = Productos::where('id', $id)->first();

        if($request->hasFile('fotoEditar')) {
            $file = $request->file('fotoEditar');
            $destinationPath = 'images/img-socios/';
            $nombreArchivo = $request->nombreEditar . '-' . $request->apellidoEditar . '-' . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $request->file('fotoEditar')->move($destinationPath, $nombreArchivo);
            $producto->foto = $destinationPath . $nombreArchivo;
        }

        $producto->codigo = $request->input("codigoEditar");
        $producto->descripcion = $request->input("descripcionEditar");
        $producto->stock = $request->input("stockEditar");
        $producto->precio_compra = $request->input("precioCompraEditar");
        $producto->precio_venta = $request->input("precioVentaEditar");


        $producto->save($request->except('_token', '_method'));
        
        return redirect()->route('inventario.index')->with('success', 'Socio Editado correctamente');



    }

    //Remove the specified resource from storage.
    public function destroy(Productos $productos)
    {
        //
    }
}
