<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\SecureUrl;

class SecureUrlTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new SecureUrl();
        $this->assertTrue($rule->passes('attribute', 'https://google.com'));
        $this->assertTrue($rule->passes('attribute', 'https://www.google.com'));
        $this->assertTrue($rule->passes('attribute', 'https://www.google.com/test'));
        $this->assertTrue($rule->passes('attribute', 'https://www.google.com/test?q=query'));
    }

    public function testRuleFails()
    {
        $rule = new SecureUrl();
        $this->assertFalse($rule->passes('attribute', 'http://google.com'));
        $this->assertFalse($rule->passes('attribute', 123));
    }
}
