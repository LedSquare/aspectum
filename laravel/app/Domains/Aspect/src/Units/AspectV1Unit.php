<?php

namespace Aspect\Units;

use Aspect\Actions\AspectUnit\MoodLevelAction;
use Aspect\Actions\AspectUnit\SelectWordsAction;
use Aspect\Exceptions\AspectDomainException;
use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Aspect;
use Inertia\Response;

class AspectV1Unit implements AspectUnitInterface
{

    public readonly int $aspectId;

    public readonly int $userId;

    /**
     * @var \Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface[]
     */
    private static array $steps = [
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

            if (!$instance->saveUnit($instance)) {
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

    public function saveUnit($instance): bool
    {
        $aspect = Aspect::findOrFail($instance->aspectId);
        $aspect->aspect_unit = $instance;

        return $aspect->save();
    }

    public function getStepParameters(): Response
    {
        $actionClass = $this->getActionClassFromCurrentStep();

        return $actionClass->getParameters($this);
    }

    public function nextStep(array $data): mixed
    {
        $actionClass = $this->getActionClassFromCurrentStep();

        $actionClass->action($data, $this);

        $this->saveUnit($this);

        return redirect()->route('aspect.current', $this->aspectId);

    }

    protected function getActionClassFromCurrentStep(): AspectActionInterface
    {
        return new AspectV1Unit::$steps[$this->currentStep];
    }

    public function incrementStep(): void
    {
        $this->currentStep += 1;

        if ($this->currentStep === $this->totalSteps) {
            // Finish
        }

    }
}
