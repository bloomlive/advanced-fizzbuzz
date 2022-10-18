<?php

namespace Tests\Unit\Rules;

use App\Rules\BigRule;
use App\Rules\IRule;
use PHPUnit\Framework\TestCase;

final class BigRuleTest extends AbstractRuleTest
{
    protected function getTestableClass(): string
    {
        return BigRule::class;
    }

    public function test_returns_true_if_bigger_than_95()
    {
        $rule = new ($this->getTestableClass());

        $this->assertTrue($rule->apply(96));
    }

    public function test_returns_false_if_equal_to_95()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(95));
    }

    public function test_returns_false_if_less_than_95()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(94));
    }

    public function test_returns_big_as_value()
    {
        $rule = new ($this->getTestableClass());

        $this->assertEquals('Big', $rule->getOutput());
    }
}