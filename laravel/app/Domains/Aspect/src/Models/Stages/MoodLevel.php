<?php

namespace Aspect\Models\Stage;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoodLevel
{
    use HasFactory;
    protected $table = 'a_mood_levels';

    protected $fillable = [
        'procent',
    ];

    protected $casts = [
        //
    ];
}
