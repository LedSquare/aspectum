<?php

namespace Aspect\Interfaces\Units;

use Aspect\Units\DTO\WordAspectObject;
use Inertia\Response;

/**
 * @template T
 *
 * @property int $aspectId
 * @property int $currentStep
 * @property array $words
 * @property array $moodLevels
 * @property boolean $isEnded
 * @staticvar \Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface[] $steps
 */
interface AspectUnitInterface
{
    public function saveUnit($instance): bool;

    public function getStepParameters(): Response;

    public function nextStep(array $data): mixed;

    /**
     * @return \Illuminate\Support\Collection<WordAspectObject>
     */
    public function getWordsDTO(int $wordsIndex = null): \Illuminate\Support\Collection;

    public function report(): array;

}
