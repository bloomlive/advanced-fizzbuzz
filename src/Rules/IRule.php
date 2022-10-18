<?php

namespace App\Rules;

interface IRule
{
    public function apply(int $value): bool;

    public function getOutput(): string;
}