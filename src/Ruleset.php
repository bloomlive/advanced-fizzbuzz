<?php

namespace App;

use App\Exceptions\RuleAlreadyInRulesetException;
use App\Rules\IRule;

class Ruleset
{
    protected array $rules = [];

    /**
     * @throws RuleAlreadyInRulesetException
     */
    public function add(IRule $rule): static
    {
        if (isset($this->rules[get_class($rule)])) {
            throw new RuleAlreadyInRulesetException();
        }

        $this->rules[get_class($rule)] = $rule;

        return $this;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function apply(int $i): string
    {
        $result = '';

        /** @var IRule $rule */
        foreach ($this->rules as $rule) {
            if ($rule->apply($i)) {
                $result .= $rule->getOutput();
            }
        }

        return $result;
    }
}