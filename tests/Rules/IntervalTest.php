<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\Interval;
use Vdhicts\ValidationRules\Tests\TestCase;

class IntervalTest extends TestCase
{
    public static function validIntervals(): array
    {
        return [
            ['PT39S'],
            ['PT59S'],
            ['PT6S'],
            ['PT4M2S'],
            [''],
        ];
    }

    public static function invalidIntervals(): array
    {
        return [
            ['test'],
            [123],
            [false],
            [null],
        ];
    }

    #[DataProvider('validIntervals')]
    public function test_rule_passes(string $interval): void
    {
        $rule = new Interval();

        $this->assertTrue($rule->passes($interval));
    }

    #[DataProvider('invalidIntervals')]
    public function test_rule_fails(mixed $interval): void
    {
        $rule = new Interval();

        $this->assertFalse($rule->passes($interval));
    }
}
