<?php

namespace App\Rules;

class BooRule implements IRule
{
    public function getOutput(): string
    {
        return 'Boo';
    }

    public function apply(int $value): bool
    {
        return ($value % 11 === 0);
    }
}