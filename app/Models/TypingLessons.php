<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypingLessons extends Model
{
    protected $table = "typing_lessons";

    use HasFactory;

    protected $fillable = [
        'lesson_title',
        'lesson_content',
        'difficulty_level',
    ];
}
