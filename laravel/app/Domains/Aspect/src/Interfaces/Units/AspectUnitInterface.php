<?php

namespace Aspect\Interfaces\Units;

use Aspect\Http\Requests\Core\ActionFormRequest;
use Inertia\Response;

/**
 * @property int $aspectId
 */
interface AspectUnitInterface
{
    public function saveUnit(): bool;

    public function selectStepOption(array $data, bool $store = null): Response;
}
