<?php

namespace Aspect\Units\DTO;

final class WordAspectObject
{
    public ?string $priority;

    public function __construct(
        public readonly int $id,
        public readonly int $order,
        public readonly string $name,
        public readonly ?string $colorCode = null,
        public readonly ?int $shapeId = null,
        public readonly ?string $shapeColorCode = null,
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

}
