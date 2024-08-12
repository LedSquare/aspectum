<?php

namespace Aspect\Units\DTO;

final class WordDTO
{
    public function __construct(
        public int $id,
        public int $order,
        public string $name,
        public ?string $colorCode,
        public ?int $shapeId,
    ) {
    }



}
