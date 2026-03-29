<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        return response()->json(Proveedor::with('productos')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string',
            'telefono' => 'nullable|string',
            'estado'   => 'boolean',
        ]);

        $proveedor = Proveedor::create($request->all());
        return response()->json($proveedor, 201);
    }

    public function show($id)
    {
        $proveedor = Proveedor::with('productos')->findOrFail($id);
        return response()->json($proveedor);
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());
        return response()->json($proveedor);
    }

    public function destroy($id)
    {
  $proveedor= Proveedor::findOrFail($id);
  $proveedor->delete(); 
  return response()->json($proveedor);
    }
}
