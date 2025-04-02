<?php

namespace App\DTOs;

use App\Models\Pedido;

// Objeto Pedido 
class PedidoDTO
{
    // Constructor 
    public function __construct(
        public readonly int $id,
        public readonly int $usuario_id,
        public readonly int $producto_id,
        public readonly int $cantidad,
        public readonly float $total,
        public readonly string $direccion_envio,
        public readonly string $estado
    ) {}

    // Método estático para crear DTO
    public static function fromModel(Pedido $pedido): self
    {
        return new self(
            $pedido->id,
            $pedido->usuario_id,
            $pedido->producto_id,
            $pedido->cantidad,
            $pedido->total,
            $pedido->direccion_envio,
            $pedido->estado
        );
    }

    // Serialización a array 
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'usuario_id' => $this->usuario_id,
            'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,
            'total' => $this->total,
            'direccion_envio' => $this->direccion_envio,
            'estado' => $this->estado
        ];
    }
}