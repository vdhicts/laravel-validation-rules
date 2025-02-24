<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\Price;
use Vdhicts\ValidationRules\Tests\TestCase;

class PriceTest extends TestCase
{
    public function test_rule_passes(): void
    {
        $rule = new Price();
        $this->assertTrue($rule->passes('10.50'));
        $this->assertTrue($rule->passes('10,50'));
        $this->assertTrue($rule->passes('105'));
        $this->assertTrue($rule->passes(',50'));
        $this->assertTrue($rule->passes('105,-'));
    }

    public function test_rule_passes_decimal_sign(): void
    {
        $rule = new Price(',');
        $this->assertTrue($rule->passes('10,50'));
        $this->assertTrue($rule->passes('105,-'));

        $rule = new Price('.');
        $this->assertTrue($rule->passes('10.50'));
        $this->assertTrue($rule->passes('105.-'));
    }

    public function test_rule_fails(): void
    {
        $rule = new Price();
        $this->assertFalse($rule->passes('no price mentioned'));
    }

    public function test_rule_fails_decimals_sign(): void
    {
        $rule = new Price(',');
        $this->assertFalse($rule->passes('10.50'));

        $rule = new Price('.');
        $this->assertFalse($rule->passes('10,50'));
    }
}
