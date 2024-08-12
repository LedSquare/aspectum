<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Stages\Word\Word;
use Aspect\Units\DTO\WordDTO;
use Inertia\Inertia;

class SelectWordsAction implements AspectActionInterface
{
    public function action(array $data, AspectUnitInterface $aspectUnit): mixed
    {
        $collection = collect();

        foreach ($data['aspect_data'] as $index => $word) {
            $collection->push(
                new WordDTO(
                    $word['id'],
                    $index,
                    $word['name'],
                    null,
                    null
                )
            );
        }
        $aspectUnit->words[$aspectUnit->currentStep] = $collection;

        return $aspectUnit;
    }

    public function getParameters(AspectUnitInterface $aspectUnit): mixed
    {
        return Inertia::render('Aspect/Word', [
            'data' => Word::all(),
            'aspect_id' => $aspectUnit->aspectId,
        ]);
    }
}
