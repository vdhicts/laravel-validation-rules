<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\DutchPhone;
use Vdhicts\ValidationRules\Tests\TestCase;

class DutchPhoneTest extends TestCase
{
    public function test_rule_passes(): void
    {
        $rule = new DutchPhone();
        $this->assertTrue($rule->passes('06-12345678'));
        $this->assertTrue($rule->passes('00316-12345678'));
        $this->assertTrue($rule->passes('+316-12345678'));
        $this->assertTrue($rule->passes('070-1234567'));
        $this->assertTrue($rule->passes('003170-1234567'));
        $this->assertTrue($rule->passes('+3170-1234567'));
    }

    public function test_rule_fails(): void
    {
        $rule = new DutchPhone();
        $this->assertFalse($rule->passes('this 06 is a fail 12345678'));
    }
}
