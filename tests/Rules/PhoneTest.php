<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\Phone;
use Vdhicts\ValidationRules\Tests\TestCase;

class PhoneTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new Phone();
        $this->assertTrue($rule->passes('', '+5-555-555-5555'));
        $this->assertTrue($rule->passes('', '+5 555 555 5555'));
        $this->assertTrue($rule->passes('', '+5(555)555-5555'));
        $this->assertTrue($rule->passes('', '(555)5555555'));
        $this->assertTrue($rule->passes('', '+33(1)5555555'));
        $this->assertTrue($rule->passes('', '+1 (555) 555 5555'));
        $this->assertTrue($rule->passes('', '06-12345678'));
        $this->assertTrue($rule->passes('', '00316-12345678'));
        $this->assertTrue($rule->passes('', '+316-12345678'));
        $this->assertTrue($rule->passes('', '070-1234567'));
        $this->assertTrue($rule->passes('', '003170-1234567'));
        $this->assertTrue($rule->passes('', '+3170-1234567'));
    }

    public function testRuleFails()
    {
        $rule = new Phone();
        $this->assertFalse($rule->passes('', '(11- 97777-7777'));
        $this->assertFalse($rule->passes('', '(555)5555 555'));
        $this->assertFalse($rule->passes('', 'this 06 is a fail 12345678'));
    }
}
