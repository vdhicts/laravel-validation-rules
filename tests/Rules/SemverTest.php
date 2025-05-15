<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\Semver;
use Vdhicts\ValidationRules\Tests\TestCase;

class SemverTest extends TestCase
{
    public static function validVersions(): array
    {
        return [
            ['0.0.1'],
            ['1.2.3'],
            ['10.20.30'],
            ['1.0.0-beta'],
            ['1.0.0-rc.1+build.1'],
            ['10.2.3-DEV-SNAPSHOT'],
        ];
    }

    public static function invalidVersions(): array
    {
        return [
            ['0.0.1a'],
            ['1.1'],
            [''],
            [123],
            [false],
            [null],
        ];
    }

    #[DataProvider('validVersions')]
    public function test_rule_passes(string $version): void
    {
        $rule = new Semver();

        $this->assertTrue($rule->passes($version));
    }

    #[DataProvider('invalidVersions')]
    public function test_rule_fails(mixed $version): void
    {
        $rule = new Semver();

        $this->assertFalse($rule->passes($version));
    }
}
