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
        Schema::create('tipo_pets', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 120);
            $table->enum('color', ['verde','amarillo','ambar','rojo']);
            $table->unsignedSmallInteger('intensidad'); // 1 a 10
            $table->unsignedSmallInteger('duracion_min'); // minutos
            $table->boolean('requiere_ayuno')->default(false);
            $table->text('observaciones')->nullable();
            $table->boolean('estado')->default(true); // activo/inactivo
            $table->timestamps();
            
    
        });

        Schema::table('tipo_pets', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_pets');
        Schema::table('tipo_pets', function (Blueprint $table) {$table->dropSoftDeletes();});
        
    }
};
