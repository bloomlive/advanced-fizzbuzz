<?php

namespace App;

use App\Exceptions\RuleAlreadyInRulesetException;
use App\Rules\IRule;

class UniqueRuleset extends Ruleset
{
    public function apply(int $i): string
    {
        /** @var IRule $rule */
        foreach ($this->rules as $rule) {
            if ($rule->apply($i)) {
                return $rule->getOutput();
            }
        }

        return $i;
    }
}