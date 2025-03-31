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
            $table->decimal('precio', 10, 2);
            $table->text('descripcion');
            $table->string('imagen')->nullable();
            $table->enum('tipo', ['Consolas', 'Controles', 'Accesorios', 'Juegos']);
            $table->enum('categoria', ['Recomendados', 'Ofertas', 'Nuevos', 'Destacados', 'Sin categoría']);
            $table->timestamps();
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
