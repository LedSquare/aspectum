<?php
namespace Aspect\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

/**
 * Fields
 * @property int $id
 * @property int $user_id
 * @property int $type_id
 * @property \Aspect\Units\AspectUnit $aspect_unit
 *
 * Realtions
 * @property \Aspect\Models\AspectType $type
 */
class Aspect extends Model
{
    use HasFactory;

    protected $table = 'aspects';

    protected $fillable = [
        'user_id',
        'type_id',
        'aspect_unit',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'type_id' => 'integer',
        'aspect_unit' => 'array',
    ];

    public function type(): HasOne
    {
        return $this->hasOne(AspectType::class, 'type_id');
    }
}
