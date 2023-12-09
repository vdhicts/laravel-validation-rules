<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\Semver;
use Vdhicts\ValidationRules\Tests\TestCase;

class SemverTest extends TestCase
{
    public function testRulePasses(): void
    {
        $rule = new Semver();
        $this->assertTrue($rule->passes('0.0.1'));
        $this->assertTrue($rule->passes('1.2.3'));
        $this->assertTrue($rule->passes('10.20.30'));
        $this->assertTrue($rule->passes('1.0.0-beta'));
        $this->assertTrue($rule->passes('1.0.0-rc.1+build.1'));
        $this->assertTrue($rule->passes('10.2.3-DEV-SNAPSHOT'));
    }

    public function testRuleFails(): void
    {
        $rule = new Semver();
        $this->assertFalse($rule->passes('0.0.1a'));
        $this->assertFalse($rule->passes('1.1'));
    }
}
