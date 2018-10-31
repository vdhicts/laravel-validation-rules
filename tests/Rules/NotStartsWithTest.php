<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\NotStartsWith;

class NotStartsWithTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new NotStartsWith('test');
        $this->assertTrue($rule->passes('', 'this is test'));

        $rule = new NotStartsWith('');
        $this->assertTrue($rule->passes('', 'test, this is'));
    }

    public function testRuleFails()
    {
        $rule = new NotStartsWith('test');
        $this->assertFalse($rule->passes('', 'test is a fail'));
    }
}
