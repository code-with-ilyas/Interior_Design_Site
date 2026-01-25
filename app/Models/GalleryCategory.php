<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = \Illuminate\Support\Str::slug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = \Illuminate\Support\Str::slug($model->name);
        });
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'gallery_category_id');
    }
}
