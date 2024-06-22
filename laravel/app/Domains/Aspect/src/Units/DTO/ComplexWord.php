<?php

namespace Aspect\Units\DTO;

final class ComplexWord
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
