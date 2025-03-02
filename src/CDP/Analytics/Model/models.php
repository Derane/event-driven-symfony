<?php

use App\CDP\Analytics\Model\ModelInterface;

$identifyModel = new class () implements ModelInterface {
    public function toArray(): array
    {
        return [];
    }
};
