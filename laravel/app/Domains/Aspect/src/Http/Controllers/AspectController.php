<?php

namespace Aspect\Http\Controllers;

use App\Http\Controllers\Controller;
use Aspect\Models\Stages\Word\Word;
use Inertia\Inertia;
use Inertia\Response;

class AspectController extends Controller
{
    public function getStep(): Response
    {
        return Inertia::render('Aspect/Aspect',[
            'title' => 'Тест - Облик',
            'words' => Word::query()->where('a_category_id', '=', 1)->get(),
        ]);
    }
}
