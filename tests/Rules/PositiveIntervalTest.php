<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use DateInterval;
use Vdhicts\ValidationRules\Rules\PositiveInterval;
use Vdhicts\ValidationRules\Tests\TestCase;

class PositiveIntervalTest extends TestCase
{
    public function test_rule_passes(): void
    {
        $rule = new PositiveInterval();
        $this->assertTrue($rule->passes('PT39S'));
        $this->assertTrue($rule->passes('PT59S'));
        $this->assertTrue($rule->passes('PT6S'));
        $this->assertTrue($rule->passes('PT4M2S'));
        $this->assertTrue($rule->passes(new DateInterval('P1D')));
    }

    public function test_rule_fails(): void
    {
        $rule = new PositiveInterval();
        $this->assertFalse($rule->passes('-P1Y'));
        $this->assertFalse($rule->passes('test'));
    }
}
