<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseCategory extends Model
{
    /** @use HasFactory<\Database\Factories\LMS\CourseCategoryFactory> */
    use HasFactory;

    protected $table = 'course_categories';

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'order',
        'is_published',
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'order' => 'integer',
        'is_published' => 'boolean',
    ];

    /**
     * Get the course that owns this category.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the lessons that belong to this category.
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'category_id')->orderBy('order');
    }
}
