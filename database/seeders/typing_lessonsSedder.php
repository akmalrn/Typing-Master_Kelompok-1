<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\typing_lessons;

class typing_lessonsSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        typing_lessons::create([
            'lesson_title' => 'Basic Typing',
            'lesson_content' => 'This is a basic typing lesson.',
            'difficulty_level' => 'easy'
        ]);

        typing_lessons::create([
            'lesson_title' => 'Intermediate Typing',
            'lesson_content' => 'This is an intermediate typing lesson.',
            'difficulty_level' => 'medium'
        ]);

        typing_lessons::create([
            'lesson_title' => 'Advanced Typing',
            'lesson_content' => 'This is an advanced typing lesson.',
            'difficulty_level' => 'hard'
        ]);
    }
}
