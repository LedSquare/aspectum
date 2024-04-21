<?php

namespace Aspect\Models\Stages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Morph Relation class
 */
class Step extends Model
{
    use HasFactory;

    protected $table = 'a_steps';

    protected $fillable = [
        'name',
        'stepable_id',
        'stepable_type',
        'a_type_id',
        'order',
    ];

    protected $casts = [
        'stepable_id' => 'integer',
        'a_type_id' => 'integer',
        'order' => 'integer',
    ];

    public function stepable(): MorphTo
    {
        return $this->morphTo();
    }
}
