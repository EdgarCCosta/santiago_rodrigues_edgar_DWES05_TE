<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'productos';
    
    // Campos asignables 
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock'
    ];
    
    // Deshabilita los timestamps
    public $timestamps = false;
}