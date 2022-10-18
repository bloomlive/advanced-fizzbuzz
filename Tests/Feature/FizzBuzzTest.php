<?php

namespace Tests\Feature;

use App\Exceptions\EndValueSmallerThanStartValueException;
use App\Exceptions\RuleAlreadyInRulesetException;
use App\FizzBuzz;
use App\Ruleset;
use PHPUnit\Framework\TestCase;
use App\Rules\{BigRule, BooRule, BuzzRule, FizzRule, FooRule, FTWRule, GGRule, SmallRule};

final class FizzBuzzTest extends TestCase
{
    /**
     * @throws EndValueSmallerThanStartValueException
     * @throws RuleAlreadyInRulesetException
     */
    public function test_it_returns_expected_output_if_calculated()
    {
        $ruleset = new Ruleset();
        $ruleset->addRule(new BuzzRule())
            ->addRule(new SmallRule())
            ->addRule(new FizzRule())
            ->addRule(new FooRule())
            ->addRule(new BooRule())
            ->addRule(new BigRule())
            ->addRule(new FTWRule())
            ->addRule(new GGRule());

        $fizzBuzz = new FizzBuzz(1, 3, $ruleset);

        $expected = 'Small
Small
SmallFizzGG';

        $this->assertEquals($expected, $fizzBuzz->calculate()->getOutput());
    }

    /**
     * @throws EndValueSmallerThanStartValueException
     * @throws RuleAlreadyInRulesetException
     */
    public function test_it_returns_empty_output_if_not_calculated()
    {
        $ruleset = new Ruleset();
        $ruleset->addRule(new BuzzRule())
            ->addRule(new SmallRule())
            ->addRule(new FizzRule())
            ->addRule(new FooRule())
            ->addRule(new BooRule())
            ->addRule(new BigRule())
            ->addRule(new FTWRule())
            ->addRule(new GGRule());

        $fizzBuzz = new FizzBuzz(1, 100, $ruleset);

        print_r($fizzBuzz->getOutput());

        $this->assertEquals('', $fizzBuzz->getOutput());
    }

    /**
     * @throws RuleAlreadyInRulesetException
     * @throws EndValueSmallerThanStartValueException
     */
    public function test_value_is_returned_if_no_rules_match()
    {
        $ruleset = new Ruleset();
        $ruleset->addRule(new BuzzRule())
            ->addRule(new SmallRule())
            ->addRule(new FizzRule())
            ->addRule(new FooRule())
            ->addRule(new BooRule())
            ->addRule(new BigRule())
            ->addRule(new FTWRule())
            ->addRule(new GGRule());

        $fizzBuzz = new FizzBuzz(92, 92, $ruleset);

        $this->assertEquals(92, $fizzBuzz->calculate()->getResult()[92]);
    }
}