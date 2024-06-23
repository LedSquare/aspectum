<?php

namespace Aspect\Http\Controllers;

use App\Http\Controllers\Controller;
use Aspect\Http\Requests\Core\ActionFormRequest;
use Aspect\Models\Aspect;
use Aspect\Units\AspectV1Unit;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class AspectController extends Controller
{
    public function start()
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
        return redirect()->route('aspect.current', $aspectUnit->aspectId);
    }

    public function next(ActionFormRequest $request, Aspect $aspect): RedirectResponse
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
