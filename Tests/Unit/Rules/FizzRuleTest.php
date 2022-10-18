<?php

namespace Tests\Unit\Rules;

use App\Rules\FizzRule;

final class FizzRuleTest extends AbstractRuleTest
{
    protected function getTestableClass(): string
    {
        return FizzRule::class;
    }

    public function test_returns_true_dividable_by_3()
    {
        $rule = new ($this->getTestableClass());

        $this->assertTrue($rule->apply(3));
        $this->assertTrue($rule->apply(12));
        $this->assertTrue($rule->apply(369));
    }

    public function test_returns_false_if_not_dividable_by_3()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(2));
        $this->assertFalse($rule->apply(5));
        $this->assertFalse($rule->apply(7));
    }

    public function test_returns_fizz_as_value()
    {
        $rule = new ($this->getTestableClass());

        $this->assertEquals('Fizz', $rule->getOutput());
    }
}