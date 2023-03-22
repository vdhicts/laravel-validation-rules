<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\Contains;
use Vdhicts\ValidationRules\Tests\TestCase;

class ContainsTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new Contains('test');
        $this->assertTrue($rule->passes('', 'this is a test'));
    }

    public function testRuleFails()
    {
        $rule = new Contains('test');
        $this->assertFalse($rule->passes('', 'this is a fail'));

        $rule = new Contains('');
        $this->assertFalse($rule->passes('', 'this is a test'));
    }
}
