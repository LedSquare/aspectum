<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Inertia\Inertia;

class ReportAction implements AspectActionInterface
{
    public function action(array $data, AspectUnitInterface $aspectUnit): mixed
    {
        $aspectUnit->moodLevels[$aspectUnit->currentStep] = $data['aspect_data'];
        return $aspectUnit;
    }

    public function getParameters(AspectUnitInterface $aspectUnit): mixed
    {
        return Inertia::render(component: 'Aspect/Report', props: [
            'data' => [
                'words' => array_values($aspectUnit->words),
                'moodLevels' => $aspectUnit->moodLevels,
            ],
            'aspect_id' => $aspectUnit->aspectId,
            'title' => __('Результат Облика')
        ]);
    }
}
