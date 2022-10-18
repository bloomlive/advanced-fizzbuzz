<?php

namespace App\Rules;

class BigRule implements IRule
{
    public function getOutput(): string
    {
        return 'Big';
    }

    public function apply(int $value): bool
    {
        return ($value > 95);
    }
}