<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\NotContains;

class NotContainsTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new NotContains('test');
        $this->assertTrue($rule->passes('', 'this is a great success'));
        $this->assertTrue($rule->passes('', ''));

        $rule = new NotContains('');
        $this->assertTrue($rule->passes('', 'this is a great success'));
        $this->assertTrue($rule->passes('', ''));
    }

    public function testRuleFails()
    {
        $rule = new NotContains('test');
        $this->assertFalse($rule->passes('', 'this is a test'));
    }
}
