<?php

namespace Tests\Unit\Rules;

use App\Rules\BuzzRule;

final class BuzzRuleTest extends AbstractRuleTest
{
    protected function getTestableClass(): string
    {
        return BuzzRule::class;
    }

    public function test_returns_true_dividable_by_5()
    {
        $rule = new ($this->getTestableClass());

        $this->assertTrue($rule->apply(5));
        $this->assertTrue($rule->apply(10));
        $this->assertTrue($rule->apply(155));
    }

    public function test_returns_false_if_not_dividable_by_5()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(1));
        $this->assertFalse($rule->apply(8));
        $this->assertFalse($rule->apply(121));
    }

    public function test_returns_buzz_as_value()
    {
        $rule = new ($this->getTestableClass());

        $this->assertEquals('Buzz', $rule->getOutput());
    }
}