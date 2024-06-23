<?php

namespace Aspect\Interfaces\Units;

use Inertia\Response;

/**
 * @property int $aspectId
 * @property int $currentStep
 * @property array $words
 * @property array $moodLevels
 * @staticvar \Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface[] $steps
 */
interface AspectUnitInterface
{
    public function saveUnit($instance): bool;

    public function getStepParameters(): Response;

    public function nextStep(array $data): mixed;

    // public function selectStepOption(array $data, bool $store = null): Response;
}
