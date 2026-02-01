<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{   
    /** @use HasFactory<\Database\Factories\LMS\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'duration',
        'is_published',
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'slug' => 'string',
        'duration' => 'integer',
        'is_published' => 'boolean',
    ];
}
