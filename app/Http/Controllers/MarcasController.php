<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
       public function index()
    {
        return response()->json(Marca::with('productos')->get());
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string',
         'estado'   => 'boolean']);
        $marca = Marca::create($request->all());
        return response()->json($marca, 201);
    }

    public function show($id)
    {
        $marca = Marca::with('productos')->findOrFail($id);
        return response()->json($marca);
    }

    public function update(Request $request, $id)
    {
        $marca = Marca::findOrFail($id);
        $marca->update($request->all());
        return response()->json($marca);
    }

    public function destroy($id)
    {
        Marca::findOrFail($id)->delete();
        return response()->json(['message' => 'Eliminado correctamente']);
    }
}
