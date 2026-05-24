<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'about',
        'profile_image',
        'email',
        'location',
        'footer_text',
    ];
}