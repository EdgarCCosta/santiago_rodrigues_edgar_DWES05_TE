<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('usuario_id');
            $table->integer('producto_id');
            $table->integer('cantidad');
            $table->decimal('total', 10, 2);
            $table->string('direccion_envio');
            $table->string('estado')->default('pendiente');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};