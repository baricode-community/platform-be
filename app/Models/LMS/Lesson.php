<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LMS\LessonFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'content',
        'video_url',
        'order',
        'duration',
        'is_published',
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'content' => 'string',
        'video_url' => 'string',
        'order' => 'integer',
        'duration' => 'integer',
        'is_published' => 'boolean',
    ];

    /**
     * Get the category that owns this lesson.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }
}
