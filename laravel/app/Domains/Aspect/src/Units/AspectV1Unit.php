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
        MoodLevel::class,
    ];

    public ?int $currentStep = 0;

    public int $totalSteps = 3;
    public array $moodLevels;
    public array $words;
    public array $colors;
    public array $figures;

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

    public function selectStepOption(array $data, bool $store = null): Response
    {
        return match (true) {
            !$store => $this->getStepParameters($data),
            $store => $this->nextStep($data),
            default => Inertia::render('Errors/Error', [
                'errors' => [__METHOD__ => 'Упс! Что-то пошло не так на этапе выбора опции в облике'],
                'code' => 400,
            ]),
        };
    }

    public function getStepParameters(array $data): Response
    {
        $actionClass = $this->getActionClass();

        return $actionClass->getParameters($data, $this);
    }

    protected function nextStep(array $data): Response
    {
        $actionClass = $this->getActionClass();

        $actionClass->action($data, $this);
        return Inertia::render('Some/Some', []);
        // if ($this->currentStep++ > $this->totalSteps){
        //     echo 'Perebor';
        // }

    }

    protected function getActionClass(): AspectActionInterface
    {
        return new $this->steps[$this->currentStep];
    }

}
