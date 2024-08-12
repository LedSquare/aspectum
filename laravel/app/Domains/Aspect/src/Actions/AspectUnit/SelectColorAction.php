<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Stages\Color;
use Aspect\Units\DTO\WordDTO;
use Inertia\Inertia;

class SelectColorAction implements AspectActionInterface
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
                    $word['colorCode'],
                    null,
                )
            );
        }
        $aspectUnit->words[$aspectUnit->currentStep] = $collection;

        return $aspectUnit;
    }

    public function getParameters(AspectUnitInterface $aspectUnit): mixed
    {
        return Inertia::render('Aspect/SelectColor', [
            'data' => [
                'aspect_id' => $aspectUnit->aspectId,
                'colors' => Color::all(),
                'words' => end($aspectUnit->words),
            ]
        ]);
    }
}
