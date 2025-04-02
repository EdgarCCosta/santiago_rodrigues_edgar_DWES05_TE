<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'usuarios';
    
    // Campos asignables 
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono'
    ];
    
    // Deshabilita los timestamps
    public $timestamps = false;
}