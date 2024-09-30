<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Enums\Units\BrainSideEnum;
use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Stages\Shape\ShapeCategory;
use Aspect\Units\DTO\WordAspectObject;
use Inertia\Inertia;

class SelectShapeAction implements AspectActionInterface
{
    public BrainSideEnum $side = BrainSideEnum::right;

    public function action(array $data, AspectUnitInterface $aspectUnit): mixed
    {
        $dataWords = $data['aspect_data'];
        $wordsDTO = collect();

        foreach ($dataWords as $index => $word) {
            $wordsDTO->push(
                values: WordAspectObject::make(wordData: $word, index: $index)
            );
        }
        $aspectUnit->words[$aspectUnit->currentStep] = $wordsDTO;

        return $aspectUnit;
    }

    public function getParameters(AspectUnitInterface $aspectUnit): mixed
    {
        return Inertia::render('Aspect/SelectShape', [
            'aspect_id' => $aspectUnit->aspectId,
            'data' => [
                'words' => $aspectUnit->getWordsDTO(),
                'shape_categories' => ShapeCategory::with('shapes')->get(),
            ],
            'title' => __('Символизация понятий')
        ]);
    }
}
