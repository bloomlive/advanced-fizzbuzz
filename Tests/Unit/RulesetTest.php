<?php

namespace Test\Unit;

use App\Exceptions\RuleAlreadyInRulesetException;
use App\Rules\BuzzRule;
use App\Rules\FizzRule;
use App\Rules\GGRule;
use App\Ruleset;
use PHPUnit\Framework\TestCase;

final class RulesetTest extends TestCase
{
    /**
     * @throws RuleAlreadyInRulesetException
     */
    public function test_rules_can_be_added_to_ruleset()
    {
        $ruleset = (new Ruleset())
            ->addRule(new FizzRule())
            ->addRule(new BuzzRule());

        $this->assertCount(2, $ruleset->getRules());
    }

    public function test_rule_is_added_only_once()
    {
        $this->expectException(RuleAlreadyInRulesetException::class);

        (new Ruleset())
            ->addRule(new FizzRule())
            ->addRule(new BuzzRule())
            ->addRule(new FizzRule());
    }

    /**
     * @throws RuleAlreadyInRulesetException
     */
    public function test_all_rules_are_applied()
    {
        $ruleset = (new Ruleset())
            ->addRule(new FizzRule())
            ->addRule(new GGRule());

        $result = $ruleset->apply(3);

        $this->assertEquals('FizzGG', $result);
    }
}