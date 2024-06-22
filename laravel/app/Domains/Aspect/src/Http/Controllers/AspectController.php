<?php

namespace Aspect\Http\Controllers;

use App\Http\Controllers\Controller;
use Aspect\Http\Requests\Core\ActionFormRequest;
use Aspect\Models\Aspect;
use Aspect\Units\AspectV1Unit;
use Inertia\Response;

class AspectController extends Controller
{
    public function start(): Response
    {
        $user = auth()->user();

        if ($aspect = $user->aspects->last()) {
            $aspectUnit = AspectV1Unit::makeInstance($aspect);
            if ($aspectUnit->isEnded) {
                $aspect = $user->aspects()->create();
                $aspectUnit = AspectV1Unit::makeInstance($aspect);
            }
        } else {
            $aspect = $user->aspects()->create();
            $aspectUnit = AspectV1Unit::makeInstance($aspect);
        }
        return $this->current($aspect);
    }

    public function next(ActionFormRequest $request, Aspect $aspect): Response
    {
        $data = $request->validated();
        $aspectUnit = $aspect->getUnit();

        return $aspectUnit->nextStep($data);
    }

    public function current(Aspect $aspect): Response
    {
        $aspectUnit = $aspect->getUnit();

        return $aspectUnit->getStepParameters();
    }
}
