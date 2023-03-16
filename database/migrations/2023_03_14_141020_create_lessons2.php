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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('subject_id');
            // Добавление внешнего ключа (ограничения)
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->bigInteger('student_id');
            // Добавление внешнего ключа (ограничения)
            $table->foreign('student_id')->references('id')->on('students');
            $table->string('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
