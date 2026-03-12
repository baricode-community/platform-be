<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'total_score',
        'answers',
    ];

    protected $casts = [
        'total_score' => 'integer',
        'answers' => 'array',
        'created_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (QuizResult $result) {
            $result->created_at = now();
        });
    }
}
