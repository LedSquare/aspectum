<?php

namespace Aspect\Units;

use Aspect\Exceptions\AspectModuleException;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Aspect;
use Aspect\Models\Stages\{
    MoodLevel,
    Color,
    Word\Word,
    Shape\Shape,
};

class AspectV1Unit implements AspectUnitInterface
{

    public array $steps = [
        MoodLevel::class,
        Word::class,
        MoodLevel::class,
        Shape::class,
        MoodLevel::class,

    ];

    public ?int $currentStep = 0;

    public int $totalSteps;
    public array $moodLevels;
    public array $words;
    public array $colors;
    public array $figures;

    private function __construct(
        public readonly int $aspectId,
        public readonly int $userId,
        // public readonly int $aspectTypeId,
    ){
    }

    public static function makeInstance(Aspect $aspect): self
    {
        $self = new self(
            $aspect->id,
            $aspect->user_id,
            // $aspect->type_id,
        );

        if(! $self->saveUnit()){
            throw new AspectModuleException('Возникла проблема при создании облика', 400);
        }

        return $self;
    }

    public function saveUnit(): bool
    {
        $aspect = Aspect::findOrFail($this->aspectId);
        $aspect->aspect_unit = $this;

        return $aspect->save();
    }

}
