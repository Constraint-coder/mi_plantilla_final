<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return response()->json(Producto::with(['marca','proveedor','categoria'])->get());
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
        'nombre'=> 'required|string',
        'descripcion'=> 'nullable|string',
        'precio'=> 'required|numeric',
        'categoria_id' => 'required|exists:categorias,id',
        'marca_id'     => 'required|exists:marcas,id',
        'proveedor_id' => 'required|exists:proveedores,id',

        ]);
        $producto = Producto::create($request->all());
        return response()->json($producto,'producto creado', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::with(['categoria', 'marca', 'proveedor'])->findOrFail($id);
        return response()->json($producto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return response()->json($producto);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
  $producto = Producto::findOrFail($id);
  $producto->delete(); 
  return response()->json($producto);
    }
}
