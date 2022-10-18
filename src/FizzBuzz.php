<?php

namespace App;

use App\Exceptions\EndValueSmallerThanStartValueException;

class FizzBuzz
{
    protected string $output = '';
    protected array $result = [];

    protected int $start;
    protected int $end;
    protected Ruleset $ruleset;

    /**
     * @throws EndValueSmallerThanStartValueException
     */
    public function __construct(int $start, int $end, Ruleset $ruleset)
    {
        if ($end < $start) {
            throw new EndValueSmallerThanStartValueException();
        }

        $this->start = $start;
        $this->end = $end;
        $this->ruleset = $ruleset;
    }

    public function calculate(): static
    {
        for ($i = $this->start; $i <= $this->end; $i++) {
            $this->result[$i] = $this->ruleset->apply($i);

            if (empty($this->result[$i])) {
                $this->result[$i] = $i;
            }
        }

        return $this;
    }

    public function getOutput(): string
    {
        return $this->output = implode(PHP_EOL, $this->getResult());
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
