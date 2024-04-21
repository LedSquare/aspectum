<?php

namespace Aspect\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspectType extends Model
{
    use HasFactory;

    protected $table = 'a_types';

    protected $fillable = [
        'name'
    ];

    protected $casts = [
        //
    ];
}
