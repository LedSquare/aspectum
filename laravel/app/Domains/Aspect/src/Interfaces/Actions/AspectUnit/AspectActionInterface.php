<?php

namespace Aspect\Interfaces\Actions\AspectUnit;

use Aspect\Http\Requests\Core\ActionFormRequest;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Illuminate\Http\Request;
use Inertia\Response;

interface AspectActionInterface
{
    public function action(array $data, AspectUnitInterface $aspectUnit): mixed;

    public function getParameters(AspectUnitInterface $aspectUnit): mixed;

}
