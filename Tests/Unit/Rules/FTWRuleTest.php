<?php

namespace Tests\Unit\Rules;

use App\Rules\FTWRule;

final class FTWRuleTest extends AbstractRuleTest
{
    protected function getTestableClass(): string
    {
        return FTWRule::class;
    }

    public function test_returns_true_if_dividable_by_3_and_5()
    {
        $rule = new ($this->getTestableClass());

        $this->assertTrue($rule->apply(15));
        $this->assertTrue($rule->apply(30));
        $this->assertTrue($rule->apply(555));
    }

    public function test_returns_false_if_not_dividable_by_3_and_5()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(2));
        $this->assertFalse($rule->apply(13));
        $this->assertFalse($rule->apply(860));
    }

    public function test_returns_ftw_as_value()
    {
        $rule = new ($this->getTestableClass());

        $this->assertEquals('FTW', $rule->getOutput());
    }
}