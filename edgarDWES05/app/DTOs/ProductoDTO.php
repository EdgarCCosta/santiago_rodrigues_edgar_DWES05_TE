<?php

namespace App\DTOs;

use App\Models\Producto;

// Objeto Producto 
class ProductoDTO
{
    // Constructor
    public function __construct(
        public readonly int $id,
        public readonly string $nombre,
        public readonly string $descripcion,
        public readonly float $precio,
        public readonly int $stock
    ) {}

    // Crea DTO desde Modelo Producto
    public static function fromModel(Producto $producto): self
    {
        return new self(
            $producto->id,
            $producto->nombre,
            $producto->descripcion,
            $producto->precio,
            $producto->stock
        );
    }

    // Serialización a array
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock
        ];
    }
}