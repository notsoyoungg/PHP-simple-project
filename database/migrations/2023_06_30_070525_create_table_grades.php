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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->bigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('grade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
