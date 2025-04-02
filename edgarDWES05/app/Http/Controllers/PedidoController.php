<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\DTOs\PedidoDTO;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Obtener todos los pedidos
    public function index()
    {
        $pedidos = Pedido::all();
        return response()->json(
            $pedidos->map(fn($pedido) => PedidoDTO::fromModel($pedido)->toArray())
        );
    }

    // Obtener un pedido específico por ID
    public function show($id)
    {
        $pedido = Pedido::find($id);
        
        if (!$pedido) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        return response()->json(PedidoDTO::fromModel($pedido)->toArray());
    }

    // Crear un nuevo pedido
    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|integer',
            'producto_id' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'direccion_envio' => 'required|string|max:255'
        ]);

        $pedido = Pedido::create([
            ...$validated,
            'estado' => 'pendiente'
        ]);

        return response()->json(PedidoDTO::fromModel($pedido)->toArray(), 201);
    }

    // Actualizar un pedido existente
    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        
        if (!$pedido) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        $validated = $request->validate([
            'estado' => 'sometimes|in:pendiente,procesando,enviado,entregado',
            'direccion_envio' => 'sometimes|string|max:255',
            'total' => 'sometimes|numeric|min:0',
            'cantidad' => 'sometimes|integer|min:1'
        ]);

        $pedido->update($validated);
        return response()->json(PedidoDTO::fromModel($pedido)->toArray());
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        
        if (!$pedido) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        $pedido->delete();
        return response()->json(null, 204);
    }
}