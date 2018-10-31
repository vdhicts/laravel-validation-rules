<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\Contains;

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
