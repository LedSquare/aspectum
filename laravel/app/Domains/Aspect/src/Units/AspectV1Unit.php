<?php

namespace Aspect\Units;

use Aspect\Actions\AspectUnit\SelectWordsAction;
use Aspect\Exceptions\AspectDomainException;
use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Aspect;
use Aspect\Models\Stages\MoodLevel;
use Inertia\Inertia;
use Inertia\Response;

class AspectV1Unit implements AspectUnitInterface
{

    public readonly int $aspectId;

    public readonly int $userId;

    /**
     * @var \Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface[]
     */
    public array $steps = [
        SelectWordsAction::class,
        MoodLevelAction::class,
    ];

    public array $moodLevels;

    public array $words;

    public int $currentStep = 0;

    public int $totalSteps = 3;


    public bool $isEnded = false;

    private function __construct(
    ) {
    }

    public static function makeInstance(Aspect $aspect): self
    {
        $instance = new self();

        if (!$aspect->aspect_unit) {
            $instance->aspectId = $aspect->id;
            $instance->userId = $aspect->user_id;

            if (!$instance->saveUnit()) {
                throw new AspectDomainException('Возникла проблема при создании облика', 400);
            }
            return $instance;

        } else {
            foreach ($aspect->aspect_unit as $key => $value) {
                if (property_exists($instance, $key)) {
                    $instance->$key = $value;
                }
            }
        }
        return $instance;

    }

    public function saveUnit(): bool
    {
        $aspect = Aspect::findOrFail($this->aspectId);
        $aspect->aspect_unit = $this;

        return $aspect->save();
    }

    public function getStepParameters(): Response
    {
        $actionClass = $this->getActionClass();

        return $actionClass->getParameters($this);


    }

    public function nextStep(array $data): Response
    {
        $actionClass = $this->getActionClass();

        $actionClass->action($data, $this);

        $this->currentStep += 1;

        dd($this);


        // $this->saveUnit();

        return $this->getStepParameters();

    }

    protected function getActionClass(): AspectActionInterface
    {
        return new $this->steps[$this->currentStep];
    }

}
