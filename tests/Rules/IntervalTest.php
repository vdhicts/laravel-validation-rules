<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\Interval;
use Vdhicts\ValidationRules\Tests\TestCase;

class IntervalTest extends TestCase
{
    public function test_rule_passes(): void
    {
        $rule = new Interval();
        $this->assertTrue($rule->passes('PT39S'));
        $this->assertTrue($rule->passes('PT59S'));
        $this->assertTrue($rule->passes('PT6S'));
        $this->assertTrue($rule->passes('PT4M2S'));
        $this->assertTrue($rule->passes(''));
    }

    public function test_rule_fails(): void
    {
        $rule = new Interval();
        $this->assertFalse($rule->passes('test'));
        $this->assertFalse($rule->passes('123'));
    }
}
