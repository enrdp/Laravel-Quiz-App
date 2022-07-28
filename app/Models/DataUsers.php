<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'answers_user','question', 'quiz_id','user_id','score'
    ];
    protected $casts = [
        'answers_user' => 'array',
        'question' => 'array'

    ];
    protected $table = 'datausers';

    public function userScore()
    {
        return $this->belongsTo(User::class);
    }
    public function quizScore()
    {
        return $this->hasMany(Quiz::class);
    }
}
