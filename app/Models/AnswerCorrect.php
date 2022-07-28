<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerCorrect extends Model
{
    use HasFactory;

    protected $table = 'answers_correct';
    protected $casts = [
        'answer' => 'array',
    ];
}
