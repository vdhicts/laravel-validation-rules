<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\Hostname;
use Vdhicts\ValidationRules\Tests\TestCase;

class HostnameTest extends TestCase
{
    public static function validHostnames(): array
    {
        return [
            ['example.com'],
            ['host-name'],
            ['www.example.com'],
        ];
    }

    public static function invalidHostnames(): array
    {
        return [
            ['I\'m not a valid hostname!'],
            ['invalid_hostname!'],
            [false],
            [''],
            [123],
            [null],
        ];
    }

    #[DataProvider('validHostnames')]
    public function test_rule_passes(string $hostname): void
    {
        $rule = new Hostname();

        $this->assertTrue($rule->passes($hostname));
    }

    #[DataProvider('invalidHostnames')]
    public function test_rule_fails(mixed $hostname): void
    {
        $rule = new Hostname();

        $this->assertFalse($rule->passes($hostname));
    }
}
