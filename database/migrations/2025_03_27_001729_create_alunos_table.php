<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('alunos')) {
            Schema::create('alunos', function (Blueprint $table) {
                $table->id();
                $table->string('nome', 150);
                $table->string('email', 150)->unique();
                $table->enum('sexo', ['M', 'F', 'O'])->nullable();
                $table->date('data_nascimento');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
