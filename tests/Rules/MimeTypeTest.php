<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\MimeType;
use Vdhicts\ValidationRules\Tests\TestCase;

class MimeTypeTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new MimeType();
        $this->assertTrue($rule->passes('', 'image/jpeg'));
        $this->assertTrue($rule->passes('', 'text/plain'));
        $this->assertTrue($rule->passes('', 'application/json'));
    }

    public function testRuleFails()
    {
        $rule = new MimeType();
        $this->assertFalse($rule->passes('', 'test'));
        $this->assertFalse($rule->passes('', '123'));
    }
}
