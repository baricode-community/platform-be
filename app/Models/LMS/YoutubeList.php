<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YoutubeList extends Model
{
    /** @use HasFactory<\Database\Factories\LMS\YoutubeListFactory> */
    use HasFactory;

    protected $table = 'youtube_list';

    protected $fillable = [
        'lesson_id',
        'youtube_url',
        'title',
        'description',
        'order',
        'is_published',
    ];

    protected $casts = [
        'lesson_id' => 'integer',
        'youtube_url' => 'string',
        'title' => 'string',
        'description' => 'string',
        'order' => 'integer',
        'is_published' => 'boolean',
    ];

    /**
     * Get the lesson that owns this youtube video.
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
