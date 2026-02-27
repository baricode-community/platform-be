<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{   
    /** @use HasFactory<\Database\Factories\LMS\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'is_published',
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'slug' => 'string',
        'is_published' => 'boolean',
    ];

    /**
     * Get the categories that belong to this course.
     */
    public function categories(): HasMany
    {
        return $this->hasMany(CourseCategory::class, 'course_id')->orderBy('order');
    }
}
