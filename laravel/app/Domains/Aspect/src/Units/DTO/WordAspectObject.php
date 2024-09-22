<?php

namespace Aspect\Units\DTO;
use Aspect\Enums\Units\BrainSideEnum;

final class WordAspectObject
{
    public BrainSideEnum $brainSide;

    public function __construct(
        public int $id,
        public int $order,
        public string $name,
        public ?string $colorCode = null,
        public ?int $shapeId = null,
        public ?string $shapeColorCode = null,
    ) {
    }

    public static function make(array $wordData, int $index): self
    {
        return new WordAspectObject(
            $wordData['id'],
            $index,
            $wordData['name'],
            $wordData['colorCode'] ?? null,
            $wordData['shapeId'] ?? null,
            $wordData['shapeColorCode'] ?? null,
        );
    }

    public function side(BrainSideEnum $side): void
    {
        $this->brainSide = $side;
    }

}
