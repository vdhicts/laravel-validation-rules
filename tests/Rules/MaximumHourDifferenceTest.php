<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Carbon\Carbon;
use Vdhicts\ValidationRules\Rules\MaximumHourDifference;
use Vdhicts\ValidationRules\Tests\TestCase;

class MaximumHourDifferenceTest extends TestCase
{
    public function test_rule_passes(): void
    {
        $start = Carbon::create(2018, 9, 18, 9);

        $rule = new MaximumHourDifference($start, 10);
        $this->assertTrue($rule->passes(Carbon::create(2018, 9, 17, 23)));
        $this->assertTrue($rule->passes(Carbon::create(2018, 9, 17, 23, 59)));
        $this->assertTrue($rule->passes(Carbon::create(2018, 9, 18, 10, 30)));
    }

    public function test_rule_fails(): void
    {
        $start = Carbon::create(2018, 9, 18, 9, 30);

        $rule = new MaximumHourDifference($start, 4);
        $this->assertFalse($rule->passes(Carbon::create(2018, 9, 17, 23)));
        $this->assertFalse($rule->passes(Carbon::create(2018, 9, 17, 13, 45)));
        $this->assertFalse($rule->passes('test'));
    }
}
