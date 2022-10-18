<?php

namespace Test\Unit;

use App\Exceptions\RuleAlreadyInRulesetException;
use App\Rules\FizzRule;
use App\Rules\GGRule;
use App\UniqueRuleset;
use PHPUnit\Framework\TestCase;

final class UniqueRulesetTest extends TestCase
{
    /**
     * @throws RuleAlreadyInRulesetException
     */
    public function test_only_first_matching_rule_is_applied()
    {
        $ruleset = (new UniqueRuleset())
            ->add(new FizzRule())
            ->add(new GGRule());

        $result = $ruleset->apply(3);

        $this->assertEquals('Fizz', $result);
    }

    /**
     * @throws RuleAlreadyInRulesetException
     */
    public function test_when_nothing_matches_value_is_returned()
    {
        $ruleset = (new UniqueRuleset())
            ->add(new FizzRule())
            ->add(new GGRule());

        $result = $ruleset->apply(16);

        $this->assertEquals(16, $result);
    }
}