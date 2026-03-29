<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
     public function index()
    {
        return response()->json(Categoria::with('productos')->get());
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string',
         'estado'   => 'boolean',
         ]);
        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = Categoria::with('productos')->findOrFail($id);
        return response()->json($categoria);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return response()->json($categoria);
    }

    public function destroy($id)
    {
  $categoria = Categoria::findOrFail($id);
  $categoria->delete(); 
  return response()->json($categoria);
    }
}
