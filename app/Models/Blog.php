<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'author_id',
        'is_published',
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'content' => 'string',
        'excerpt' => 'string',
        'featured_image' => 'string',
        'is_published' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the author of the blog post.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the categories for this blog post.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_category', 'blog_id', 'category_id')
            ->withTimestamps();
    }

    /**
     * Get the tags for this blog post.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class, 'blog_tag', 'blog_id', 'tag_id')
            ->withTimestamps();
    }

    /**
     * Scope to only published posts
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Get reading time in minutes
     */
    public function getReadingTimeAttribute(): int
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return (int) ceil($wordCount / 200);
    }

    /**
     * Get word count
     */
    public function getWordCountAttribute(): int
    {
        return str_word_count(strip_tags($this->content));
    }
}
