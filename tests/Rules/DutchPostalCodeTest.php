<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\DutchPostalCode;
use Vdhicts\ValidationRules\Tests\TestCase;

class DutchPostalCodeTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new DutchPostalCode();
        $this->assertTrue($rule->passes('', '1234 AA'));
        $this->assertTrue($rule->passes('', '1234AA'));
    }

    public function testRuleFails()
    {
        $rule = new DutchPostalCode();
        $this->assertFalse($rule->passes('', 'this 1234 fail AA'));
    }
}
