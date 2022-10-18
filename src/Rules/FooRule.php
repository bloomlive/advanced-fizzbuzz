<?php

namespace App\Rules;

class FooRule implements IRule
{
    public function getOutput(): string
    {
        return 'Foo';
    }

    public function apply(int $value): bool
    {
        return ($value % 7 === 0);
    }
}