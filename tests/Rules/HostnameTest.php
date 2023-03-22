<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\Hostname;
use Vdhicts\ValidationRules\Tests\TestCase;

class HostnameTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new Hostname();
        $this->assertTrue($rule->passes('', 'example.com'));
        $this->assertTrue($rule->passes('', 'host-name'));
        $this->assertTrue($rule->passes('', 'www.example.com'));
    }

    public function testRuleFails()
    {
        $rule = new Hostname();
        $this->assertFalse($rule->passes('', 'I\'m not a valid hostname!'));
    }
}
