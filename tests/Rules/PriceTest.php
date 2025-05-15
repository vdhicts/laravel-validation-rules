<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\Price;
use Vdhicts\ValidationRules\Tests\TestCase;

class PriceTest extends TestCase
{
    public static function validPrices(): array
    {
        return [
            ['10.50'],
            ['10,50'],
            ['105'],
            [',50'],
            ['105,-'],
        ];
    }

    public static function validPricesWithDecimals(): array
    {
        return [
            ['10,50', ','],
            ['105,-', ','],
            ['10.50', '.'],
            ['105.-', '.'],
        ];
    }

    public static function invalidPrices(): array
    {
        return [
            ['no price mentioned'],
            [''],
            [123],
            [false],
            [null],
        ];
    }

    public static function invalidPricesAccordingToDecimals(): array
    {
        return [
            ['10.50', ','],
            ['10,50', '.'],
        ];
    }

    #[DataProvider('validPrices')]
    public function test_rule_passes(string $price): void
    {
        $rule = new Price();

        $this->assertTrue($rule->passes($price));
    }

    #[DataProvider('validPricesWithDecimals')]
    public function test_rule_passes_decimal_sign(string $price, string $decimalSign): void
    {
        $rule = new Price($decimalSign);

        $this->assertTrue($rule->passes($price));
    }

    #[DataProvider('invalidPrices')]
    public function test_rule_fails(mixed $price): void
    {
        $rule = new Price();

        $this->assertFalse($rule->passes($price));
    }

    #[DataProvider('invalidPricesAccordingToDecimals')]
    public function test_rule_fails_decimals_sign(string $price, string $decimalSign): void
    {
        $rule = new Price($decimalSign);

        $this->assertFalse($rule->passes($price));
    }
}
