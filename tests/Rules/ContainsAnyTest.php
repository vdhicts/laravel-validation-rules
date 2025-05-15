<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\ContainsAny;
use Vdhicts\ValidationRules\Tests\TestCase;

class ContainsAnyTest extends TestCase
{
    public static function stringContainsAnyValue(): array
    {
        return [
            ['this is a test to see if foo or bar is in the text', ['foo', 'bar']],
            ['this is a test to see if foo or bar is in the text', ['foo', 'check']],
            ['this is a test to see if foo or bar is in the text', ['foo']],
            ['this is a test to see if foo or bar is in the text', ['bar']],
        ];
    }

    public static function stringNotContainsAnyValue(): array
    {
        return [
            ['this is a fail', ['test']],
            ['this is a fail', ['']],
            ['', ['']],
            [false, ['']],
            [123, ['']],
            [null, ['']],
        ];
    }

    #[DataProvider('stringContainsAnyValue')]
    public function test_rule_passes(string $haystack, array $needle): void
    {
        $rule = new ContainsAny($needle);

        $this->assertTrue($rule->passes($haystack));
    }

    #[DataProvider('stringNotContainsAnyValue')]
    public function test_rule_fails(mixed $haystack, array $needle): void
    {
        $rule = new ContainsAny($needle);

        $this->assertFalse($rule->passes($haystack));
    }
}
