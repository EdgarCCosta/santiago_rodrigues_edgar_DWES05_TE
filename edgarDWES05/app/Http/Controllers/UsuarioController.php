<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\DTOs\UsuarioDTO;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Obtener todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json(
            $usuarios->map(fn($usuario) => UsuarioDTO::fromModel($usuario)->toArray())
        );
    }

    // Obtener un usuario específico por ID
    public function show($id)
    {
        $usuario = Usuario::find($id);
        
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        return response()->json(UsuarioDTO::fromModel($usuario)->toArray());
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'telefono' => 'nullable|string|max:20'
        ]);

        $usuario = Usuario::create($validated);
        return response()->json(UsuarioDTO::fromModel($usuario)->toArray(), 201);
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'apellido' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|unique:usuarios,email,'.$usuario->id,
            'telefono' => 'nullable|string|max:20'
        ]);

        $usuario->update($validated);
        return response()->json(UsuarioDTO::fromModel($usuario)->toArray());
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(null, 204);
    }
}