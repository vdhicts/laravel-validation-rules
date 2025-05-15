<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\Phone;
use Vdhicts\ValidationRules\Tests\TestCase;

class PhoneTest extends TestCase
{
    public static function validPhoneNumbers(): array
    {
        return [
            ['+5-555-555-5555'],
            ['+5 555 555 5555'],
            ['+5(555)555-5555'],
            ['(555)5555555'],
            ['+33(1)5555555'],
            ['+1 (555) 555 5555'],
            ['06-12345678'],
            ['00316-12345678'],
            ['+316-12345678'],
            ['070-1234567'],
            ['003170-1234567'],
            ['+3170-1234567'],
        ];
    }

    public static function invalidPhoneNumbers(): array
    {
        return [
            ['(11- 97777-7777'],
            ['(555)5555 555'],
            ['this 06 is a fail 12345678'],
            [false],
            [null],
        ];
    }

    #[DataProvider('validPhoneNumbers')]
    public function test_rule_passes(string $phoneNumber): void
    {
        $rule = new Phone();

        $this->assertTrue($rule->passes($phoneNumber));
    }

    #[DataProvider('invalidPhoneNumbers')]
    public function test_rule_fails(mixed $phoneNumber): void
    {
        $rule = new Phone();

        $this->assertFalse($rule->passes($phoneNumber));
    }
}
