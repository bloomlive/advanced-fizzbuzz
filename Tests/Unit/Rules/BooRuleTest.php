<?php

namespace Tests\Unit\Rules;

use App\Rules\BooRule;
use App\Rules\IRule;
use PHPUnit\Framework\TestCase;

final class BooRuleTest extends AbstractRuleTest
{
    protected function getTestableClass(): string
    {
        return BooRule::class;
    }

    public function test_returns_true_dividable_by_11()
    {
        $rule = new ($this->getTestableClass());

        $this->assertTrue($rule->apply(11));
        $this->assertTrue($rule->apply(33));
        $this->assertTrue($rule->apply(121));
    }

    public function test_returns_false_if_not_dividable_by_11()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(1));
        $this->assertFalse($rule->apply(8));
        $this->assertFalse($rule->apply(120));
    }

    public function test_returns_boo_as_value()
    {
        $rule = new ($this->getTestableClass());

        $this->assertEquals('Boo', $rule->getOutput());
    }
}