<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Stages\Shape\Shape;
use Aspect\Units\DTO\WordAspectObject;
use Inertia\Inertia;

class SelectOrderShapesAction implements AspectActionInterface
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
        $words = $aspectUnit->getWordsDTO();

        return Inertia::render('Aspect/SelectOrderShapes', [
            'data' => [
                'words' => $words,
                'shapes' => Shape::whereIn('id', $words->pluck('shapeId'))->get(),
            ],
            'aspect_id' => $aspectUnit->aspectId,
            'title' => __('Установка приоритетов символов')
        ]);
    }
}
