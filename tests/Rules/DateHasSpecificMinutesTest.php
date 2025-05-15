<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\DateHasSpecificMinutes;
use Vdhicts\ValidationRules\Tests\TestCase;

class DateHasSpecificMinutesTest extends TestCase
{
    public static function validMinutes(): array
    {
        return [
            [[0, 10, 20, 30, 40, 55], '2021-09-30 00:00'],
            [[0, 10, 20, 30, 40, 55], '2021-09-30 01:10'],
            [[0, 10, 20, 30, 40, 55], '2021-09-30 01:20'],
            [[0, 10, 20, 30, 40, 55], '2021-09-30 01:30'],
            [[0, 10, 20, 30, 40, 55], '2021-09-30 01:40'],
            [[0, 10, 20, 30, 40, 55], '2021-09-30 01:55'],

        ];
    }

    public static function validMinutesWithCustomFormat(): array
    {
        return [
            [[0, 15, 30, 45], 'd-m-Y H:i', '30-09-2021 09:30'],
        ];
    }

    public static function invalidMinutes(): array
    {
        return [
            [[0, 10, 20, 30, 40, 55], 'lol'],
            [[0, 10, 20, 30, 40, 55], '2021-09-30 01:01'],
            [[0, 10, 20, 30, 40, 55], '2021-09-30 01:02'],
            [[0, 15, 30, 45], '30-09-2021 09:17'],
            [[0, 15, 30, 45], ''],
            [[0, 15, 30, 45], 123],
            [[0, 15, 30, 45], false],
            [[0, 15, 30, 45], null],
        ];
    }

    #[DataProvider('validMinutes')]
    public function test_rule_passes(array $allowedMinutes, string $providedDate): void
    {
        $rule = new DateHasSpecificMinutes($allowedMinutes);

        $this->assertTrue($rule->passes($providedDate));
    }

    #[DataProvider('validMinutesWithCustomFormat')]
    public function test_rule_passes_with_custom_format(array $allowedMinutes, string $format, string $providedDate): void
    {
        $rule = new DateHasSpecificMinutes($allowedMinutes, $format);

        $this->assertTrue($rule->passes($providedDate));
    }

    #[DataProvider('invalidMinutes')]
    public function test_rule_fails(array $allowedMinutes, mixed $providedDate): void
    {
        $rule = new DateHasSpecificMinutes($allowedMinutes);

        $this->assertFalse($rule->passes($providedDate));
    }
}
