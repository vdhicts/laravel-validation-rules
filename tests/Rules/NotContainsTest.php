<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\NotContains;
use Vdhicts\ValidationRules\Tests\TestCase;

class NotContainsTest extends TestCase
{
    public function testRulePasses(): void
    {
        $rule = new NotContains('test');
        $this->assertTrue($rule->passes('this is a great success'));
        $this->assertTrue($rule->passes(''));

        $rule = new NotContains('');
        $this->assertTrue($rule->passes('this is a great success'));
        $this->assertTrue($rule->passes(''));
    }

    public function testRuleFails(): void
    {
        $rule = new NotContains('test');
        $this->assertFalse($rule->passes('this is a test'));
    }
}
