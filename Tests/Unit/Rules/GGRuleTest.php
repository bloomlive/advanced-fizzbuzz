<?php

namespace Tests\Unit\Rules;

use App\Rules\GGRule;

final class GGRuleTest extends AbstractRuleTest
{
    protected function getTestableClass(): string
    {
        return GGRule::class;
    }

    public function test_returns_true_if_dividable_by_3_or_5()
    {
        $rule = new ($this->getTestableClass());

        $this->assertTrue($rule->apply(333));
        $this->assertTrue($rule->apply(861));
    }

    public function test_returns_false_if_not_dividable_by_3_or_5()
    {
        $rule = new ($this->getTestableClass());

        $this->assertFalse($rule->apply(2));
        $this->assertFalse($rule->apply(13));
        $this->assertFalse($rule->apply(862));
    }

    public function test_returns_ftw_as_value()
    {
        $rule = new ($this->getTestableClass());

        $this->assertEquals('GG', $rule->getOutput());
    }
}