<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Stages\MoodLevel;
use Inertia\Inertia;

class MoodLevelAction implements AspectActionInterface
{
    public function action(array $data, AspectUnitInterface $aspectUnit): mixed
    {
        $aspectUnit->moodLevels[$aspectUnit->currentStep] = $data['aspect_data'];
        return $aspectUnit;
    }

    public function getParameters(AspectUnitInterface $aspectUnit): mixed
    {
        return Inertia::render('Aspect/MoodLevel', [
            'data' => MoodLevel::all(),
            'aspect_id' => $aspectUnit->aspectId,
        ]);
    }
}
