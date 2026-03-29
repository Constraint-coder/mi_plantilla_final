<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
             $table->string('nombre');
              $table->text('descripcion')->nullable();
               $table->float('precio');
             $table->bigInteger('categoria_id')->constrained('categorias');
            $table->bigInteger('marca_id')->constrained('marcas');
            $table->bigInteger('proveedor_id')->constrained('proveedores');      
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
