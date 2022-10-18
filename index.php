<?php

require_once 'vendor/autoload.php';

use App\FizzBuzz;
use App\Ruleset;
use App\Rules\{BigRule, BooRule, BuzzRule, FizzRule, FooRule, FTWRule, GGRule, SmallRule};

try {
    $ruleset = (new Ruleset())
        ->add(new BuzzRule())
        ->add(new SmallRule())
        ->add(new FizzRule())
        ->add(new FooRule())
        ->add(new BooRule())
        ->add(new BigRule())
        ->add(new FTWRule())
        ->add(new GGRule());

    $fizzBuzz = new FizzBuzz(-1, 100, $ruleset);

    print_r($fizzBuzz
        ->calculate()
        ->getOutput());
} catch (\App\Exceptions\RuleAlreadyInRulesetException $e) {
    echo 'You have added a rule twice. This is not allowed by design.';
} catch (\App\Exceptions\EndValueSmallerThanStartValueException $e) {
    echo 'Start value must be larger integer than end value.';
}