<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\DateAfterOrEqual;
use Vdhicts\ValidationRules\Tests\TestCase;

class DateAfterOrEqualTest extends TestCase
{
    public static function datesAfterOrEqual(): array
    {
        return [
            [Carbon::create(2018, 9), '2018-09-01'],
            [Carbon::create(2018, 9), '2018-09-21'],
        ];
    }

    public static function datesNotAfterOrEqual(): array
    {
        return [
            [Carbon::create(2018, 9), '2018-08-01'],
            [Carbon::create(2018, 9), 'test'],
            [Carbon::create(2018, 9), ''],
            [Carbon::create(2018, 9), 123],
            [Carbon::create(2018, 9), false],
            [Carbon::create(2018, 9), null],
        ];
    }

    #[DataProvider('datesAfterOrEqual')]
    public function test_rule_passes(CarbonInterface $date, string $providedDate): void
    {
        $rule = new DateAfterOrEqual($date);

        $this->assertTrue($rule->passes($providedDate));
    }

    #[DataProvider('datesNotAfterOrEqual')]
    public function test_rule_fails(CarbonInterface $date, mixed $providedDate): void
    {
        $rule = new DateAfterOrEqual($date);

        $this->assertFalse($rule->passes($providedDate));
    }
}
