<?php

namespace Aspect\Http\Controllers;

use App\Http\Controllers\Controller;
use Aspect\Http\Requests\Core\ActionFormRequest;
use Aspect\Models\Aspect;
use Aspect\Units\AspectV1Unit;
use Inertia\Inertia;
use Inertia\Response;

class AspectController extends Controller
{
    public function start(ActionFormRequest $request): Response
    {
        $user = auth()->user();

        $aspectUnit = AspectV1Unit::makeInstance($user->aspects()->create());

        return $aspectUnit->selectStepOption($request);
    }
    public function getStep(ActionFormRequest $request, Aspect $aspect): Response
    {
        $aspectUnit = $aspect->getUnit();

        return $aspectUnit->selectStepOption($request);
    }

    public function nextStep(ActionFormRequest $request, Aspect $aspect): Response
    {
        $aspectUnit = $aspect->getUnit();

        return $aspectUnit->selectStepOption($request);
    }

}
