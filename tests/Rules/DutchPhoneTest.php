<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\DutchPhone;
use Vdhicts\ValidationRules\Tests\TestCase;

class DutchPhoneTest extends TestCase
{
    public static function validDutchPhoneNumbers(): array
    {
        return [
            ['06-12345678'],
            ['00316-12345678'],
            ['+316-12345678'],
            ['070-1234567'],
            ['003170-1234567'],
            ['+3170-1234567'],
        ];
    }

    public static function invalidDutchPhoneNumbers(): array
    {
        return [
            ['this 06 is a fail 12345678'],
            [''],
            [123],
            [false],
            [null],
        ];
    }

    #[DataProvider('validDutchPhoneNumbers')]
    public function test_rule_passes(string $phoneNumber): void
    {
        $rule = new DutchPhone();

        $this->assertTrue($rule->passes($phoneNumber));
    }

    #[DataProvider('invalidDutchPhoneNumbers')]
    public function test_rule_fails(mixed $phoneNumber): void
    {
        $rule = new DutchPhone();

        $this->assertFalse($rule->passes($phoneNumber));
    }
}
