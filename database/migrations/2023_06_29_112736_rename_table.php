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
        Schema::rename('lessons', 'students_grades');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('students_grades', 'lessons');
    }
};
