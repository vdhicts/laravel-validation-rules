<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Carbon\Carbon;
use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\MaximumHourDifference;

class MaximumHourDifferenceTest extends TestCase
{
    public function testRulePasses()
    {
        $start = Carbon::create(2018, 9, 18, 9, 0, 0);

        $rule = new MaximumHourDifference($start, 10);
        $this->assertTrue($rule->passes('', Carbon::create(2018, 9, 17, 23, 0, 0)));
        $this->assertTrue($rule->passes('', Carbon::create(2018, 9, 17, 23, 59, 0)));
        $this->assertTrue($rule->passes('', Carbon::create(2018, 9, 18, 10, 30, 0)));
    }

    public function testRuleFails()
    {
        $start = Carbon::create(2018, 9, 18, 9, 30, 0);

        $rule = new MaximumHourDifference($start, 4);
        $this->assertFalse($rule->passes('', Carbon::create(2018, 9, 17, 23, 0, 0)));
        $this->assertFalse($rule->passes('', Carbon::create(2018, 9, 17, 13, 45, 0)));
        $this->assertFalse($rule->passes('', 'test'));
    }
}
