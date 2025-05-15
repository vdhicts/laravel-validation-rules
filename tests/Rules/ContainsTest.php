<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\Contains;
use Vdhicts\ValidationRules\Tests\TestCase;

class ContainsTest extends TestCase
{
    public static function stringContainsValue(): array
    {
        return [
            ['this is a test', 'test'],
            ['this is a test', 'is a'],
            ['this is a test', 'this'],
        ];
    }

    public static function stringNotContainsValue(): array
    {
        return [
            ['this is a great success', 'test'],
            ['', 'test'],
            ['this is a great success', ''],
            ['', ''],
        ];
    }

    #[DataProvider('stringContainsValue')]
    public function test_rule_passes(string $haystack, string $needle): void
    {
        $rule = new Contains($needle);

        $this->assertTrue($rule->passes($haystack));
    }

    #[DataProvider('stringNotContainsValue')]
    public function test_rule_fails(string $haystack, string $needle): void
    {
        $rule = new Contains($needle);

        $this->assertFalse($rule->passes($haystack));
    }
}
