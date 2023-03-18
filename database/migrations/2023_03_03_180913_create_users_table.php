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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('cin')->nullable();
            $table->string('adresse')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('tel')->nullable();
            $table->string('gender')->nullable();
            $table->string('description')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->foreignId('role_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('image')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
