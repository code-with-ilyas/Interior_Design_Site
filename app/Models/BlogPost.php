<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the category that owns the blog post.
     */
    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Get the images for the blog post.
     */
    public function blogPostImages()
    {
        return $this->hasMany(BlogPostImage::class);
    }
}
