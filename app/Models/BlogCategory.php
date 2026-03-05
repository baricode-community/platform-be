<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogCategory extends Model
{
    /** @use HasFactory<\Database\Factories\BlogCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
    ];

    /**
     * Get the blog posts for this category.
     */
    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class, 'blog_category', 'category_id', 'blog_id')
            ->withTimestamps();
    }
}
