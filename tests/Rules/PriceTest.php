<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\Price;
use Vdhicts\ValidationRules\Tests\TestCase;

class PriceTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new Price();
        $this->assertTrue($rule->passes('', '10.50'));
        $this->assertTrue($rule->passes('', '10,50'));
        $this->assertTrue($rule->passes('', '105'));
        $this->assertTrue($rule->passes('', ',50'));
        $this->assertTrue($rule->passes('', '105,-'));
    }

    public function testRulePassesDecimalSign()
    {
        $rule = new Price(',');
        $this->assertTrue($rule->passes('', '10,50'));
        $this->assertTrue($rule->passes('', '105,-'));

        $rule = new Price('.');
        $this->assertTrue($rule->passes('', '10.50'));
        $this->assertTrue($rule->passes('', '105.-'));
    }

    public function testRuleFails()
    {
        $rule = new Price();
        $this->assertFalse($rule->passes('', 'no price mentioned'));
    }

    public function testRuleFailsDecimalsSign()
    {
        $rule = new Price(',');
        $this->assertFalse($rule->passes('', '10.50'));

        $rule = new Price('.');
        $this->assertFalse($rule->passes('', '10,50'));
    }
}
