<?php

namespace Aspect\Interfaces\Actions\AspectUnit;

use Aspect\Interfaces\Units\AspectUnitInterface;


interface AspectActionInterface
{
    public function action(array $data, AspectUnitInterface $aspectUnit): mixed;

    public function getParameters(AspectUnitInterface $aspectUnit): mixed;

}
