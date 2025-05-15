<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\SecureUrl;
use Vdhicts\ValidationRules\Tests\TestCase;

class SecureUrlTest extends TestCase
{
    public static function secureUrls(): array
    {
        return [
            ['https://google.com'],
            ['https://www.google.com'],
            ['https://www.google.com/test'],
            ['https://www.google.com/test?q=query'],
        ];
    }

    public static function insecureUrls(): array
    {
        return [
            ['http://google.com'],
            ['123'],
            [''],
            [123],
            [false],
            [null],
        ];
    }

    #[DataProvider('secureUrls')]
    public function test_rule_passes(string $secureUrl): void
    {
        $rule = new SecureUrl();

        $this->assertTrue($rule->passes($secureUrl));
    }

    #[DataProvider('insecureUrls')]
    public function test_rule_fails(mixed $insecureUrl): void
    {
        $rule = new SecureUrl();

        $this->assertFalse($rule->passes($insecureUrl));
    }
}
