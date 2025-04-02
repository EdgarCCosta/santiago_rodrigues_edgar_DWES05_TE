<?php

namespace App\DTOs;

use App\Models\Usuario;

// Objeto Usuario 
class UsuarioDTO
{   
    // Constructor
    public function __construct(
        public readonly int $id,
        public readonly string $nombre,
        public readonly string $apellido,
        public readonly string $email,
        public readonly string $telefono
    ) {}

    // Crea DTO desde Modelo Usuario
    public static function fromModel(Usuario $usuario): self
    {
        return new self(
            $usuario->id,
            $usuario->nombre,
            $usuario->apellido,
            $usuario->email,
            $usuario->telefono
        );
    }

    // Serialización a array
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'telefono' => $this->telefono
        ];
    }
}