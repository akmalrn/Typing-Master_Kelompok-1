<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_typing_sessions', function (Blueprint $table) {
            $table->id(); // Primary key with auto-increment
            $table->unsignedBigInteger('user_id'); // Foreign key reference to users table
            $table->unsignedBigInteger('lesson_id'); // Foreign key reference to typing_lessons table
            $table->float('wpm'); // Words per minute
            $table->float('accuracy'); // Accuracy percentage
            $table->integer('errors'); // Number of errors
            $table->integer('practice_time'); // Practice time in seconds
            $table->timestamp('session_date')->default(DB::raw('CURRENT_TIMESTAMP')); // Session date and time

            // Defining foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('typing_lessons')->onDelete('cascade');

            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_typing_sessions');
    }
};
