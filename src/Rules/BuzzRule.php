<?php

namespace App\Rules;

class BuzzRule implements IRule
{
    public function getOutput(): string
    {
        return 'Buzz';
    }

    public function apply(int $value): bool
    {
        return ($value % 5 === 0);
    }
}