<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Http\Requests\Core\ActionFormRequest;
use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Stages\Word\Word;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SelectWordsAction implements AspectActionInterface
{
    public function action(ActionFormRequest $request, AspectUnitInterface $aspectUnit): mixed
    {
        $aspectUnit;
        return 'asd';
    }

    public function getParameters(Request $request): mixed
    {
        return Word::all();
    }
}
