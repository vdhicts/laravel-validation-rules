<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\Price;
use Vdhicts\ValidationRules\Tests\TestCase;

class PriceTest extends TestCase
{
    public function testRulePasses(): void
    {
        $rule = new Price();
        $this->assertTrue($rule->passes('10.50'));
        $this->assertTrue($rule->passes('10,50'));
        $this->assertTrue($rule->passes('105'));
        $this->assertTrue($rule->passes(',50'));
        $this->assertTrue($rule->passes('105,-'));
    }

    public function testRulePassesDecimalSign(): void
    {
        $rule = new Price(',');
        $this->assertTrue($rule->passes('10,50'));
        $this->assertTrue($rule->passes('105,-'));

        $rule = new Price('.');
        $this->assertTrue($rule->passes('10.50'));
        $this->assertTrue($rule->passes('105.-'));
    }

    public function testRuleFails(): void
    {
        $rule = new Price();
        $this->assertFalse($rule->passes('no price mentioned'));
    }

    public function testRuleFailsDecimalsSign(): void
    {
        $rule = new Price(',');
        $this->assertFalse($rule->passes('10.50'));

        $rule = new Price('.');
        $this->assertFalse($rule->passes('10,50'));
    }
}
