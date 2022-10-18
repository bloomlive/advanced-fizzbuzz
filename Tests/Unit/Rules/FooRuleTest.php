<?php

namespace Tests\Unit\Rules;

use App\Rules\FooRule;

final class FooRuleTest extends AbstractRuleTest
{
    protected function getTestableClass(): string
    {
        return FooRule::class;
    }

    public function test_returns_true_dividable_by_7()
    {
        $rule = new ($this->getTestableClass());

        $this->assertTrue($rule->apply(7));
        $this->assertTrue($rule->apply(14));
        $this->assertTrue($rule->apply(861));
    }

    public function test_returns_false_if_not_dividable_by_7()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(2));
        $this->assertFalse($rule->apply(13));
        $this->assertFalse($rule->apply(860));
    }

    public function test_returns_foo_as_value()
    {
        $rule = new ($this->getTestableClass());

        $this->assertEquals('Foo', $rule->getOutput());
    }
}