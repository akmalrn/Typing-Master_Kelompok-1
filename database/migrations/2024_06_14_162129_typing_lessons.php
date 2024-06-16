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
         Schema::create('typing_lessons', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key
            $table->string('lesson_title', 255); // Creates a VARCHAR(255) column
            $table->text('lesson_content'); // Creates a TEXT column
            $table->string('difficulty_level', 50)->nullable(); // Creates a VARCHAR(50) column that can be NULL
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typing_lessons');
    }
};
