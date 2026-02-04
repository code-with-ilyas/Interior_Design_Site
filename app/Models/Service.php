<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'icon', 'short_description', 'long_description', 'image', 'service_category_id'];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ServiceImage::class)->where('is_primary', true);
    }
}
