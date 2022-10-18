<?php

namespace Tests\Unit\Rules;

use App\Rules\SmallRule;

final class SmallRuleTest extends AbstractRuleTest
{
    protected function getTestableClass(): string
    {
        return SmallRule::class;
    }

    public function test_returns_true_if_smaller_than_16()
    {
        $rule = new ($this->getTestableClass());

        $this->assertTrue($rule->apply(15));
    }

    public function test_returns_false_if_equal_to_16()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(16));
    }

    public function test_returns_false_if_larger_than_16()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(17));
    }

    public function test_returns_small_as_value()
    {
        $rule = new ($this->getTestableClass());

        $this->assertEquals('Small', $rule->getOutput());
    }
}