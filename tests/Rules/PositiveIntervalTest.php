<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use DateInterval;
use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\PositiveInterval;
use Vdhicts\ValidationRules\Tests\TestCase;

class PositiveIntervalTest extends TestCase
{
    public static function validIntervals(): array
    {
        return [
            ['PT39S'],
            ['PT59S'],
            ['PT6S'],
            ['PT4M2S'],
            [new DateInterval('P1D')],
        ];
    }

    public static function invalidIntervals(): array
    {
        return [
            ['-P1Y'],
            ['test'],
            [false],
            [null],
        ];
    }

    #[DataProvider('validIntervals')]
    public function test_rule_passes(string|DateInterval $interval): void
    {
        $rule = new PositiveInterval();

        $this->assertTrue($rule->passes($interval));
    }

    #[DataProvider('invalidIntervals')]
    public function test_rule_fails(mixed $interval): void
    {
        $rule = new PositiveInterval();

        $this->assertFalse($rule->passes($interval));
    }
}
