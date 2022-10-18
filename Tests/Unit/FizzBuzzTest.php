<?php

namespace Tests\Unit;

use App\Exceptions\EndValueSmallerThanStartValueException;
use App\FizzBuzz;
use App\Ruleset;
use PHPUnit\Framework\TestCase;

final class FizzBuzzTest extends TestCase
{
    public function test_end_value_cannot_be_smaller_than_start_value()
    {
        $this->expectException(EndValueSmallerThanStartValueException::class);

        new FizzBuzz(100, 1, new Ruleset());
    }
}