<?php

namespace Aspect\Models\Stage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'a_colors';

    protected $fillable = [
        'name',
        'hex_code',
    ];

    protected $casts = [
        //
    ];
}
