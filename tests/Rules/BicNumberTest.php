<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\BicNumber;
use Vdhicts\ValidationRules\Tests\TestCase;

class BicNumberTest extends TestCase
{
    public static function validBicNumbers(): array
    {
        return [
            ['RBOSGGSX'],
            ['RZTIAT22263'],
            ['BCEELULL'],
            ['MARKDEFF'],
            ['GENODEF1JEV'],
            ['UBSWCHZH80A'],
            ['CEDELULLXXX'],
        ];
    }

    public static function invalidBicNumbers(): array
    {
        return [
            ['CE1EL2LLFFF'],
            ['E31DCLLFFF'],
            ['12345678'],
            ['BIC12345'],
            ['BIC!@#$%^&*()'],
            ['BIC1234567890'],
            [false],
            [null],
        ];
    }

    #[DataProvider('validBicNumbers')]
    public function test_rule_passes(string $bicNumber): void
    {
        $rule = new BicNumber();

        $this->assertTrue($rule->passes($bicNumber));
    }

    #[DataProvider('invalidBicNumbers')]
    public function test_rule_fails(mixed $bicNumber): void
    {
        $rule = new BicNumber();

        $this->assertFalse($rule->passes($bicNumber));
    }
}
