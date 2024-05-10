<?php

namespace Aspect\Units;

use Aspect\Exceptions\AspectModuleException;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Aspect;
use Aspect\Models\Stages\Step;
use Aspect\Models\Stages\Word\Word;
use Illuminate\Support\Collection;

class AspectUnit implements AspectUnitInterface
{

    /**
     * @var Step[]
     */
    private array $steps;

    /**
     * @var Word
     */
    public array $words;
    public array $colors;
    public array $figures;

    private function __construct(
        public readonly int $aspectId,
        public readonly int $userId,
        public readonly int $aspectTypeId,
    ){
    }

    public static function makeInstance(Aspect $aspect): self
    {
        $self = new self(
            $aspect->id,
            $aspect->user_id,
            $aspect->type_id,
        );

        $self->setSteps($aspect->type->steps);
        if(! $self->saveUnit()){
            throw new AspectModuleException('Возникла проблема при создании облика', 400);
        }

        return $self;
    }

    /**
     * Set steps
     *
     * @param Collection<Step|Step[]> $steps
     * @return void
     */
    protected function setSteps(Collection|array $steps): void
    {
        $this->steps = $steps;
    }

    public function saveUnit(): bool
    {
        $aspect = Aspect::findOrFail($this->aspectId);
        $aspect->aspect_unit = $this;

        return $aspect->save();
    }

}
