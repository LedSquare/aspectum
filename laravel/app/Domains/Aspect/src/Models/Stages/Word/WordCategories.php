<?php

namespace Aspect\Models\Stages\Word;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WordCategories extends Model
{
    use HasFactory;

    protected $table = 'a_word_categories';

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        //
    ];

    public function words(): HasMany
    {
        return $this->hasMany(Word::class, 'a_word_category_id');
    }
}
