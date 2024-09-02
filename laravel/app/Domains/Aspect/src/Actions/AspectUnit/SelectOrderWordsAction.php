<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Units\DTO\WordDTO;
use Inertia\Inertia;

class SelectOrderWordsAction implements AspectActionInterface
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
        return Inertia::render('Aspect/SelectOrderWords', [
            'data' => [
                'words' => $aspectUnit->getWordsDTO()
            ],
            'aspect_id' => $aspectUnit->aspectId,
            'title' => 'Приоритет понятий'
        ]);
    }
}
