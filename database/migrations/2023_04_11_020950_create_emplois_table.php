<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->foreignId('prof_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('matiere_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate(); 
            $table->foreignId('classe_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate(); 
            $table->foreignId('salle_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emplois');
    }
};
