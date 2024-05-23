<?php

namespace Aspect\Interfaces\Actions\AspectUnit;

use Aspect\Http\Requests\Core\ActionFormRequest;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Illuminate\Http\Request;
use Inertia\Response;

interface AspectActionInterface
{
    public function action(ActionFormRequest $request, AspectUnitInterface $aspectUnit): mixed;

    public function getParameters(Request $request, AspectUnitInterface $aspectUnit): mixed;

}
