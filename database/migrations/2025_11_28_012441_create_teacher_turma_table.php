<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teacher_turma', function (Blueprint $table) {
            $table->foreignId('turma_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->primary(['turma_id', 'teacher_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teacher_turma');
    }
};
