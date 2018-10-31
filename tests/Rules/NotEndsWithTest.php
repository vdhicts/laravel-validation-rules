<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\NotEndsWith;

class NotEndsWithTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new NotEndsWith('test');
        $this->assertTrue($rule->passes('', 'test, this is'));
        $this->assertTrue($rule->passes('', ''));

        $rule = new NotEndsWith('');
        $this->assertTrue($rule->passes('', 'test, this is'));
    }

    public function testRuleFails()
    {
        $rule = new NotEndsWith('test');
        $this->assertFalse($rule->passes('', 'this is a test'));
    }
}
