<?php

namespace Aspect\Units;

use Aspect\Actions\AspectUnit\SelectWordsAction;
use Aspect\Exceptions\AspectDomainException;
use Aspect\Http\Requests\Core\ActionFormRequest;
use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Aspect;
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
    ];

    public ?int $currentStep = 0;

    public int $totalSteps = 3;
    public array $moodLevels;
    public array $words;
    public array $colors;
    public array $figures;

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
                ;
            }
            ;
        }
        return $instance;

    }

    public function saveUnit(): bool
    {
        $aspect = Aspect::findOrFail($this->aspectId);
        $aspect->aspect_unit = $this;

        return $aspect->save();
    }

    public function selectStepOption(ActionFormRequest $request): Response
    {
        if ($request->method() === 'GET') {
            return $this->getStepParameters($request);
        } else {
            return $this->nextStep($request);
        }

    }

    public function getStepParameters(ActionFormRequest $request): Response
    {
        $actionClass = $this->getActionClass();

        return $actionClass->getParameters($request, $this);
    }

    protected function nextStep(ActionFormRequest $request): Response
    {
        $actionClass = $this->getActionClass();

        dd($actionClass->action($request, $this));
        // dd('NEXT_STEP');
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
