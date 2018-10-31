<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\StartsWith;

class StartsWithTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new StartsWith('test');
        $this->assertTrue($rule->passes('', 'test, this is'));
    }

    public function testRuleFails()
    {
        $rule = new StartsWith('test');
        $this->assertFalse($rule->passes('', 'this is a fail'));

        $rule = new StartsWith('');
        $this->assertFalse($rule->passes('', 'test, this is'));
    }
}
