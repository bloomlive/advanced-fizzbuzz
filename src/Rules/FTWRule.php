<?php

namespace App\Rules;

class FTWRule implements IRule
{

    public function getOutput(): string
    {
        return 'FTW';
    }

    public function apply(int $value): bool
    {
        return ($value % 3 === 0 && $value % 5 === 0);
    }
}