<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\DTOs\ProductoDTO;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        $productos = Producto::all();
        return response()->json(
            $productos->map(fn($producto) => ProductoDTO::fromModel($producto)->toArray())
        );
    }

    // Obtener un producto específico por ID
    public function show($id)
    {
        $producto = Producto::find($id);
        
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        return response()->json(ProductoDTO::fromModel($producto)->toArray());
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $producto = Producto::create($validated);
        return response()->json(ProductoDTO::fromModel($producto)->toArray(), 201);
    }

    // Actualizar un producto existente
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'descripcion' => 'sometimes|string|max:255',
            'precio' => 'sometimes|numeric|min:0',
            'stock' => 'sometimes|integer|min:0'
        ]);

        $producto->update($validated);
        return response()->json(ProductoDTO::fromModel($producto)->toArray());
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::find($id);
        
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $producto->delete();
        return response()->json(null, 204);
    }
}