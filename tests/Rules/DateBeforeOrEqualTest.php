<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\DateBeforeOrEqual;
use Vdhicts\ValidationRules\Tests\TestCase;

class DateBeforeOrEqualTest extends TestCase
{
    public static function datesBeforeOrEqual(): array
    {
        return [
            [Carbon::create(2018, 9), '2018-09-01'],
            [Carbon::create(2018, 9), '2018-08-21'],
        ];
    }

    public static function datesNotBeforeOrEqual(): array
    {
        return [
            [Carbon::create(2018, 9), '2018-09-22'],
            [Carbon::create(2018, 9), 'test'],
            [Carbon::create(2018, 9), ''],
            [Carbon::create(2018, 9), 123],
            [Carbon::create(2018, 9), false],
            [Carbon::create(2018, 9), null],
        ];
    }

    #[DataProvider('datesBeforeOrEqual')]
    public function test_rule_passes(CarbonInterface $date, string $providedDate): void
    {
        $rule = new DateBeforeOrEqual($date);

        $this->assertTrue($rule->passes($providedDate));
    }

    #[DataProvider('datesNotBeforeOrEqual')]
    public function test_rule_fails(CarbonInterface $date, mixed $providedDate): void
    {
        $rule = new DateBeforeOrEqual($date);

        $this->assertFalse($rule->passes($providedDate));
    }
}
