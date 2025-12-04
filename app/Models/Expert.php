<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
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
        'experience_years' => 'integer',
    ];

    /**
     * The skills that belong to the expert.
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'expert_skill');
    }

    /**
     * The projects that the expert worked on.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_expert')->withPivot('role');
    }
}
