<?php

namespace App\Rules;

class FizzRule implements IRule
{
    public function getOutput(): string
    {
        return 'Fizz';
    }

    public function apply(int $value): bool
    {
        return ($value % 3 === 0);
    }
}