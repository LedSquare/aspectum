<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Stages\Color;
use Aspect\Models\Stages\Shape\Shape;
use Aspect\Units\DTO\WordDTO;
use Inertia\Inertia;

class SelectColorShapeAction implements AspectActionInterface
{
    public function action(array $data, AspectUnitInterface $aspectUnit): mixed
    {
        $collection = collect();
        foreach ($data['aspect_data'] as $index => $word) {
            $collection->push(
                WordDTO::make($word, $index)
            );
        }
        $aspectUnit->words[$aspectUnit->currentStep] = $collection;

        return $aspectUnit;
    }

    public function getParameters(AspectUnitInterface $aspectUnit): mixed
    {
        $words = $aspectUnit->getWordsDTO();

        return Inertia::render('Aspect/SelectColor', [
            'aspect_id' => $aspectUnit->aspectId,
            'data' => [
                'colors' => Color::all(),
                'words' => $words,
                'shapes' => Shape::whereIn('id', $words->pluck('shapeId'))->get(),
            ]
        ]);
    }
}
