<?php

namespace App\Rules;

class SmallRule implements IRule
{
    public function getOutput(): string
    {
        return 'Small';
    }

    public function apply(int $value): bool
    {
        return ($value < 16);
    }
}