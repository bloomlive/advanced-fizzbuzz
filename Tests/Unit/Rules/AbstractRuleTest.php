<?php

namespace Tests\Unit\Rules;

use App\Rules\IRule;
use PHPUnit\Framework\TestCase;

abstract class AbstractRuleTest extends TestCase
{
    abstract protected function getTestableClass(): string;

    public function test_is_instance_of_irule(): void
    {
        $rule = new ($this->getTestableClass());

        $this->assertInstanceOf(IRule::class, $rule);
    }
}