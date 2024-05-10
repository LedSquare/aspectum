<?php

namespace Aspect\Models\Stages\Word;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Word extends Model
{
    use HasFactory;

    protected $table = 'a_words';

    protected $fillable = [
        'a_word_category_id',
        'name',
    ];

    protected $casts = [
        'a_word_category_id' => 'integer',
    ];

    public function wordCategories(): BelongsTo
    {
        return $this->belongsTo(Word::class, 'a_word_category_id');
    }
}
