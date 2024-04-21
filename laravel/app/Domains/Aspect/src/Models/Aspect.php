<?php
namespace Aspect\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspect extends Model
{
    use HasFactory;

    protected $table = 'aspects';

    protected $fillable = [
        'user_id',
        'type_id',
        'aspect_entity',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'type_id' => 'integer',
        'aspect_entity' => 'array',
    ];
}
