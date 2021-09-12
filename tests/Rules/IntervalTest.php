<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\Interval;

class IntervalTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new Interval();
        $this->assertTrue($rule->passes('', 'PT39S'));
        $this->assertTrue($rule->passes('', 'PT59S'));
        $this->assertTrue($rule->passes('', 'PT6S'));
        $this->assertTrue($rule->passes('', 'PT4M2S'));
        $this->assertTrue($rule->passes('', ''));
    }

    public function testRuleFails()
    {
        $rule = new Interval();
        $this->assertFalse($rule->passes('', 'test'));
        $this->assertFalse($rule->passes('', '123'));
    }
}
