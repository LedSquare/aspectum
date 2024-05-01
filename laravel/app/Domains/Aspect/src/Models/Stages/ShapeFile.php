<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShapeFile extends Model
{
    use HasFactory;

    protected $table = 'a_shape_files';

    protected $fillable = [
        'filename',
        'extension',
        'size',
        'disk',
        'path',
    ];

    protected $casts = [
        'size' => 'integer',
    ];
}
