<?php

namespace Aspect\Interfaces\Units;

use Aspect\Http\Requests\Core\ActionFormRequest;
use Inertia\Response;

interface AspectUnitInterface
{
    public function saveUnit(): bool;

    public function selectStepOption(ActionFormRequest $request): Response;
}
