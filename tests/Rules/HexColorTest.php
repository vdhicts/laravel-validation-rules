<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\HexColor;
use Vdhicts\ValidationRules\Tests\TestCase;

class HexColorTest extends TestCase
{
    public function testRulePasses(): void
    {
        $rule = new HexColor();
        $this->assertTrue($rule->passes('#fff'));
        $this->assertTrue($rule->passes('#fff000'));
        $this->assertTrue($rule->passes('#000000'));
        $this->assertTrue($rule->passes('#a0a0a0'));
    }

    public function testRuleFails(): void
    {
        $rule = new HexColor();
        $this->assertFalse($rule->passes('this 06 is a fail 12345678'));
    }
}
