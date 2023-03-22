<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\ContainsAny;

class ContainsAnyTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new ContainsAny(['foo', 'bar']);
        $this->assertTrue($rule->passes('', 'this is a test to see if foo or bar is in the text'));
    }

    public function testRuleFails()
    {
        $rule = new ContainsAny(['test']);
        $this->assertFalse($rule->passes('', 'this is a fail'));

        $rule = new ContainsAny(['']);
        $this->assertFalse($rule->passes('', 'this is a test'));
    }
}