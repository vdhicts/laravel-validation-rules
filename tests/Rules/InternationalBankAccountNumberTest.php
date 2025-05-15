<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\InternationalBankAccountNumber;
use Vdhicts\ValidationRules\Tests\TestCase;

class InternationalBankAccountNumberTest extends TestCase
{
    public static function validInternationalBankAccountNumbers(): array
    {
        return [
            ['GR1601101250000000012300695'],
            ['MU17BOMM0101101030300200000MUR'],
            ['NL91ABNA0417164300'],
        ];
    }

    public static function invalidInternationalBankAccountNumbers(): array
    {
        return [
            ['1234 no iban here'],
            [''],
            [123],
            [false],
            [null],
        ];
    }

    #[DataProvider('validInternationalBankAccountNumbers')]
    public function test_rule_passes(string $iban): void
    {
        $rule = new InternationalBankAccountNumber();

        $this->assertTrue($rule->passes($iban));
    }

    #[DataProvider('invalidInternationalBankAccountNumbers')]
    public function test_rule_fails(mixed $iban): void
    {
        $rule = new InternationalBankAccountNumber();

        $this->assertFalse($rule->passes($iban));
    }
}
