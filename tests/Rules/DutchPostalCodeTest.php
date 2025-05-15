<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\DutchPostalCode;
use Vdhicts\ValidationRules\Tests\TestCase;

class DutchPostalCodeTest extends TestCase
{
    public static function validPostalCodes(): array
    {
        return [
            ['1234 AA'],
            ['1234AA'],
            ['2345 AB'],
            ['2345AB'],
        ];
    }

    public static function invalidPostalCodes(): array
    {
        return [
            ['this 1234 fail AA'],
            [''],
            [123],
            [false],
            [null],
        ];
    }

    #[DataProvider('validPostalCodes')]
    public function test_rule_passes(string $postalCode): void
    {
        $rule = new DutchPostalCode();

        $this->assertTrue($rule->passes($postalCode));
    }

    #[DataProvider('invalidPostalCodes')]
    public function test_rule_fails(mixed $postalCode): void
    {
        $rule = new DutchPostalCode();

        $this->assertFalse($rule->passes($postalCode));
    }
}
