<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\MaximumHourDifference;
use Vdhicts\ValidationRules\Tests\TestCase;

class MaximumHourDifferenceTest extends TestCase
{
    public static function validDifferences(): array
    {
        return [
            [10, Carbon::create(2018, 9, 18, 9), Carbon::create(2018, 9, 17, 23)],
            [10, Carbon::create(2018, 9, 18, 9), Carbon::create(2018, 9, 17, 23, 59)],
            [10, Carbon::create(2018, 9, 18, 9), Carbon::create(2018, 9, 18, 10, 30)],
        ];
    }

    public static function invalidDifferences(): array
    {
        return [
            [4, Carbon::create(2018, 9, 18, 9, 30), Carbon::create(2018, 9, 17, 23)],
            [4, Carbon::create(2018, 9, 18, 9, 30), Carbon::create(2018, 9, 17, 13, 45)],
            [4, Carbon::create(2018, 9, 18, 9, 30), 'test'],
            [4, Carbon::create(2018, 9, 18, 9, 30), false],
            [4, Carbon::create(2018, 9, 18, 9, 30), null],
        ];
    }

    #[DataProvider('validDifferences')]
    public function test_rule_passes(int $diff, CarbonInterface $start, CarbonInterface $till): void
    {
        $rule = new MaximumHourDifference($start, $diff);

        $this->assertTrue($rule->passes($till));
    }

    #[DataProvider('invalidDifferences')]
    public function test_rule_fails(int $diff, CarbonInterface $start, mixed $till): void
    {
        $rule = new MaximumHourDifference($start, $diff);

        $this->assertFalse($rule->passes($till));
    }
}
