<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'pedidos';
    
    // Campos asignables 
    protected $fillable = [
        'usuario_id',
        'producto_id',
        'cantidad',
        'total',
        'direccion_envio',
        'estado'
    ];
    
    // Habilita los timestamps
    public $timestamps = true; 
}