<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('matriculas')) {
            Schema::create('matriculas', function (Blueprint $table) {
                $table->id();
                $table->foreignId('aluno_id')->constrained()->onDelete('cascade');
                $table->foreignId('curso_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
