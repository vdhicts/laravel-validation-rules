<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\SecureUrl;
use Vdhicts\ValidationRules\Tests\TestCase;

class SecureUrlTest extends TestCase
{
    public function test_rule_passes(): void
    {
        $rule = new SecureUrl();
        $this->assertTrue($rule->passes('https://google.com'));
        $this->assertTrue($rule->passes('https://www.google.com'));
        $this->assertTrue($rule->passes('https://www.google.com/test'));
        $this->assertTrue($rule->passes('https://www.google.com/test?q=query'));
    }

    public function test_rule_fails(): void
    {
        $rule = new SecureUrl();
        $this->assertFalse($rule->passes('http://google.com'));
        $this->assertFalse($rule->passes(123));
    }
}
