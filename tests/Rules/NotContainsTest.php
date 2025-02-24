<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\NotContains;
use Vdhicts\ValidationRules\Tests\TestCase;

class NotContainsTest extends TestCase
{
    public function test_rule_passes(): void
    {
        $rule = new NotContains('test');
        $this->assertTrue($rule->passes('this is a great success'));
        $this->assertTrue($rule->passes(''));

        $rule = new NotContains('');
        $this->assertTrue($rule->passes('this is a great success'));
        $this->assertTrue($rule->passes(''));
    }

    public function test_rule_fails(): void
    {
        $rule = new NotContains('test');
        $this->assertFalse($rule->passes('this is a test'));
    }
}
