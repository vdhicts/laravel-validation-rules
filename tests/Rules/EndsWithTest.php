<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\EndsWith;

class EndsWithTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new EndsWith('test');
        $this->assertTrue($rule->passes('', 'this is a test'));
    }

    public function testRuleFails()
    {
        $rule = new EndsWith('test');
        $this->assertFalse($rule->passes('', 'this is a fail'));

        $rule = new EndsWith('');
        $this->assertFalse($rule->passes('', 'this is a test '));
    }
}
