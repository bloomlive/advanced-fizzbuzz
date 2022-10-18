<?php

namespace App\Rules;

class GGRule implements IRule
{

    public function getOutput(): string
    {
        return 'GG';
    }

    public function apply(int $value): bool
    {
        return ($value % 3 === 0 || $value % 5 === 0);
    }
}