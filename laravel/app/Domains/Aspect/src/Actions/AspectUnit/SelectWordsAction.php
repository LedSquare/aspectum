<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Stages\Word\Word;
use Aspect\Units\DTO\WordAspectObject;
use Inertia\Inertia;

class SelectWordsAction implements AspectActionInterface
{
    public function action(array $data, AspectUnitInterface $aspectUnit): mixed
    {
        $collection = collect();

        foreach ($data['aspect_data'] as $index => $word) {
            $collection->push(
                WordAspectObject::make($word, $index)
            );
        }
        $aspectUnit->words[$aspectUnit->currentStep] = $collection;

        return $aspectUnit;
    }

    public function getParameters(AspectUnitInterface $aspectUnit): mixed
    {
        $words = collect();
        foreach (Word::all()->toArray() as $index => $word) {
            $words->push(
                WordAspectObject::make($word, $index),
            );
        }
        return Inertia::render('Aspect/SelectWords', [
            'data' => $words,
            'aspect_id' => $aspectUnit->aspectId,
            'title' => __('Выбор понятий'),
        ]);
    }
}
