<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    protected $fillable = [
        'title',
        'value',
        'icon',
        'sort',
        'is_active',
    ];
}
