<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\VersionNumber;
use Vdhicts\ValidationRules\Tests\TestCase;

class VersionNumberTest extends TestCase
{
    public static function validVersionsWithoutPatchRequired(): array
    {
        return [
            ['0.0'],
            ['1.2'],
            ['10.20'],
            ['0.0.1'],
            ['1.2.3'],
            ['10.20.30'],
            ['100.0.1'],
            ['100.2.3'],
            ['100.20.30'],
        ];
    }

    public static function invalidVersionsWithoutPatchRequired(): array
    {
        return [
            ['1.0.0-beta'],
            ['1.0.0-rc.1+build.1'],
            ['10.2.3-DEV-SNAPSHOT'],
            [''],
            [123],
            [false],
            [null],
        ];
    }

    public static function validVersionsWithPatchRequired(): array
    {
        return [
            ['0.0.1'],
            ['1.2.3'],
            ['10.20.30'],
            ['100.0.1'],
            ['100.2.3'],
            ['100.20.30'],
        ];
    }

    public static function invalidVersionsWithPatchRequired(): array
    {
        return [
            ['0.0'],
            ['1.2'],
            ['10.20'],
            ['100.99'],
            ['1.0.0-beta'],
            ['1.0.0-rc.1+build.1'],
            ['10.2.3-DEV-SNAPSHOT'],
        ];
    }

    #[DataProvider('validVersionsWithoutPatchRequired')]
    public function test_rule_passes_without_patch_required(string $version): void
    {
        $rule = new VersionNumber();

        $this->assertTrue($rule->passes($version));
    }

    #[DataProvider('invalidVersionsWithoutPatchRequired')]
    public function test_rule_fails_without_patch_required(mixed $version): void
    {
        $rule = new VersionNumber();

        $this->assertFalse($rule->passes($version));
    }

    #[DataProvider('validVersionsWithPatchRequired')]
    public function test_rule_passes_with_patch_required(string $version): void
    {
        $rule = new VersionNumber(true);

        $this->assertTrue($rule->passes($version));
    }

    #[DataProvider('invalidVersionsWithPatchRequired')]
    public function test_rule_fails_with_patch_required(string $version): void
    {
        $rule = new VersionNumber(true);

        $this->assertFalse($rule->passes($version));
    }
}
