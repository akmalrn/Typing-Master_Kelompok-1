<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_typing_sessions extends Model
{
    use HasFactory;

    protected $table = 'user_typing_sessions';

    // Field yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'lesson_id',
        'wpm',
        'accuracy',
        'errors',
    ];

    // Relasi dengan model User (jika Anda ingin menghubungkan dengan tabel users)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
