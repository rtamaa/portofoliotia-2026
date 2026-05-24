<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'short_description',
        'background',
        'objective',
        'features',
        'tech_stack',
        'database_design',
        'flowchart_desc',
        'documentation',
        'conclusion',
        'tags',
        'thumbnail',
        'erd',
        'flowchart',
        'is_active',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}