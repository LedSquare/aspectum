<?php

namespace Aspect\Http\Controllers;

use App\Http\Controllers\Controller;
use Aspect\Http\Requests\Core\ActionFormRequest;
use Aspect\Models\Aspect;
use Aspect\Models\Stages\Word\Word;
use Aspect\Units\AspectV1Unit;
use Inertia\Inertia;
use Inertia\Response;

class AspectController extends Controller
{
    public function start()
    {
        $user = auth()->user();

        $aspectUnit = AspectV1Unit::makeInstance($user->aspects()->create());

        return Inertia::render('Aspect/Word', [
            'data' => Word::all(),
            'aspect_id' => $aspectUnit->aspectId,
        ]);

        // return $aspectUnit->selectStepOption($request);
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
