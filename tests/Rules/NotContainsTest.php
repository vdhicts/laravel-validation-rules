<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\NotContains;
use Vdhicts\ValidationRules\Tests\TestCase;

class NotContainsTest extends TestCase
{
    public static function stringNotContainsValue(): array
    {
        return [
            ['this is a great success', 'test'],
            ['', 'test'],
            ['this is a great success', ''],
            ['', ''],
        ];
    }

    public static function stringContainsValue(): array
    {
        return [
            ['this is a test', 'test'],
            ['this is a test', 'is a'],
            ['this is a test', 'this'],
            [123, 'this'],
            [false, 'this'],
            [null, 'this'],
        ];
    }

    #[DataProvider('stringNotContainsValue')]
    public function test_rule_passes(string $haystack, string $needle): void
    {
        $rule = new NotContains($needle);

        $this->assertTrue($rule->passes($haystack));
    }

    #[DataProvider('stringContainsValue')]
    public function test_rule_fails(mixed $haystack, string $needle): void
    {
        $rule = new NotContains($needle);

        $this->assertFalse($rule->passes($haystack));
    }
}
