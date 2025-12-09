<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
        'budget' => 'decimal:2',
        'duration_weeks' => 'integer',
        'completion_year' => 'integer',
    ];

    
    public function projectCategory()
    {
        return $this->belongsTo(ProjectCategory::class);
    }

    
    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class);
    }

    
    public function experts()
    {
        return $this->belongsToMany(Expert::class, 'project_expert')->withPivot('role');
    }
}
