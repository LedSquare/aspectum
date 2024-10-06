<?php

namespace Aspect\Units;

use Aspect\Actions\AspectUnit\MoodLevelAction;
use Aspect\Actions\AspectUnit\SelectColorShapeAction;
use Aspect\Actions\AspectUnit\SelectColorWordAction;
use Aspect\Actions\AspectUnit\SelectNewOrderColorsWords;
use Aspect\Actions\AspectUnit\SelectOrderShapesAction;
use Aspect\Actions\AspectUnit\SelectOrderWordsAction;
use Aspect\Actions\AspectUnit\SelectShapeAction;
use Aspect\Actions\AspectUnit\SelectWordsAction;
use Aspect\Exceptions\AspectDomainException;
use Aspect\Interfaces\Actions\AspectUnit\AspectActionInterface;
use Aspect\Interfaces\UnitResponses\ResponseInterface;
use Aspect\Interfaces\Units\AspectUnitInterface;
use Aspect\Models\Aspect;
use Aspect\Units\DTO\WordAspectObject;
use Illuminate\Support\Collection;

/**
 * @template T of self
 * @template-implements AspectUnitInterface<T>
 */
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
        SelectShapeAction::class,
        MoodLevelAction::class,
        SelectOrderWordsAction::class,
        MoodLevelAction::class,
        SelectColorWordAction::class,
        MoodLevelAction::class,
        SelectOrderShapesAction::class,
        MoodLevelAction::class,
        SelectColorShapeAction::class,
        MoodLevelAction::class,
        SelectNewOrderColorsWords::class,
    ];

    /**
     * @var int<\Aspect\Enums\Units\BrainSideEnum>[]
     */
    public array $brainMap;

    public array $moodLevels;

    /**
     * @var \Illuminate\Support\Collection<WordAspectObject>[]
     */
    public array $words;

    public int $currentStep = 0;

    public readonly int $totalSteps;

    public bool $isEnded = false;
    private function __construct(
    ) {
    }

    /**
     * @param \Aspect\Models\Aspect $aspect
     * @throws \Aspect\Exceptions\AspectDomainException
     * @return \Aspect\Units\AspectV1Unit
     */
    public static function makeInstance(Aspect $aspect): self
    {
        $instance = new self();

        if (!$aspect->aspect_unit) {
            $instance->aspectId = $aspect->id;
            $instance->userId = $aspect->user_id;
            $instance->totalSteps = count(self::$steps) - 1;


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

    public function nextStep(array $data): self
    {
        $actionClass = $this->getActionClassFromCurrentStep();

        $actionClass->action($data, $this);

        $this->setBrainSideFromAction($actionClass);

        $this->incrementStep();

        $this->saveUnit($this);

        return $this;

    }

    /**
     * @param \Illuminate\Support\Collection<WordAspectObject> &$words
     * @return void
     */
    public function setNewPriority(Collection &$words): void
    {
        $previosWords = $this->getWordsFromUnit();

        $words->each(function ($word) use ($previosWords) {
            $previosWord = $previosWords->firstWhere('id', '=', $word->id);

            $priority = match (true) {
                $word->order == $previosWord->order => null,
                $word->order < $previosWord->order => '+',
                $word->order > $previosWord->order => '-',
            };

            $word->priority = $priority;
        });
    }

    public function getStepParameters(): ResponseInterface
    {
        $actionClass = $this->getActionClassFromCurrentStep();
        return $actionClass->getParameters($this);
    }

    private function setBrainSideFromAction(AspectActionInterface $action): void
    {
        if (isset($action->side)) {
            $this->brainMap[$this->currentStep] = $action->side->name;
        }
    }

    /**
     *
     * @param integer|null $wordsIndex
     * @return \Illuminate\Support\Collection<WordAspectObject>
     */
    public function getWordsFromUnit(int $wordsIndex = null): Collection
    {
        $wordsIndex
            ? $wordsFromUnit = $this->words[$wordsIndex]
            : $wordsFromUnit = end(array: $this->words);
        throw_if(!$wordsFromUnit, new AspectDomainException(__('На предыдущем шаге отсутствуют понятия')));

        $words = collect();
        foreach ($wordsFromUnit as $index => $word) {
            $words->push(
                WordAspectObject::make($word, $index)
            );
        }
        return $words;
    }

    public function saveUnit($instance): bool
    {
        $aspect = Aspect::findOrFail($instance->aspectId);
        $aspect->aspect_unit = $instance;
        $aspect->isEnded = $instance->isEnded;

        return $aspect->save();
    }

    protected function getActionClassFromCurrentStep(): AspectActionInterface
    {
        return new AspectV1Unit::$steps[$this->currentStep];
    }


    public function incrementStep(): void
    {
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep += 1;
        } elseif ($this->currentStep === $this->totalSteps) {
            $this->isEnded = true;
        }
    }

    public function report(): array
    {
        $steps = [];
        $sides = array_values($this->brainMap);

        foreach (array_values($this->words) as $key => $words) {
            $steps[$key] = [
                'words' => $words,
                'side' => $sides[$key],
            ];
        }

        return [
            'data' => [
                'steps' => $steps,
                'moodLevels' => $this->moodLevels,
            ],
            'aspect_id' => $this->aspectId,
            'title' => __('Результат Облика')
        ];
    }
}
