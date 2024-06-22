<?php

namespace Aspect\Interfaces\Units;

use Aspect\Http\Requests\Core\ActionFormRequest;
use Inertia\Response;

/**
 * @property int $aspectId
 * @property int $currentStep
 * @property array $words
 * @property array $moodLevels
 */
interface AspectUnitInterface
{
    public function saveUnit(): bool;

    public function getStepParameters(): Response;

    public function nextStep(array $data): Response;

    // public function selectStepOption(array $data, bool $store = null): Response;
}
