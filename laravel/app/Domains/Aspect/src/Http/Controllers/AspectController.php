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
        return $aspectUnit->selectStepOption([], false);
    }

    public function store(ActionFormRequest $request, Aspect $aspect): Response
    {
        $data = $request->validated();
        $aspectUnit = $aspect->getUnit();

        return $aspectUnit->selectStepOption($data['words'], $data['store']);
    }

    // protected function ifAspectExists
}
