<?php

namespace Aspect\Actions\AspectUnit;

use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Stages\Shape\ShapeCategory;
use Inertia\Inertia;

class SelectShapeAction implements AspectActionInterface
{
    public function action(array $data, AspectUnitInterface $aspectUnit): mixed
    {
        return 'asd';
    }

    public function getParameters(AspectUnitInterface $aspectUnit): mixed
    {
        return Inertia::render('Aspect/SelectShape', [
            'aspect_id' => $aspectUnit->aspectId,
            'data' => [
                'shape_categories' => ShapeCategory::with('shapes')->get(),
            ],
        ]);
    }
}
