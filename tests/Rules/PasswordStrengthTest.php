<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\PasswordStrength;

class PasswordStrengthTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new PasswordStrength();
        $this->assertTrue($rule->passes('', 'TestTest1'));
        $this->assertTrue($rule->passes('', 'Test-Test_1!@'));
        $this->assertTrue($rule->passes('', '1!_A-@test'));
    }

    public function testRuleFails()
    {
        $rule = new PasswordStrength();
        $this->assertFalse($rule->passes('', 'test'));
        $this->assertFalse($rule->passes('', 'testtest'));
        $this->assertFalse($rule->passes('', 'testTest'));
        $this->assertFalse($rule->passes('', 'testtest_1'));
        $this->assertFalse($rule->passes('', 'TESTTEST_1'));
    }
}
