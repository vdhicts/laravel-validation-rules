<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\HexColor;

class HexColorTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new HexColor();
        $this->assertTrue($rule->passes('', '#fff'));
        $this->assertTrue($rule->passes('', '#fff000'));
        $this->assertTrue($rule->passes('', '#000000'));
        $this->assertTrue($rule->passes('', '#a0a0a0'));
    }

    public function testRuleFails()
    {
        $rule = new HexColor();
        $this->assertFalse($rule->passes('', 'this 06 is a fail 12345678'));
    }
}
