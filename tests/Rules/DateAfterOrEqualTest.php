<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Carbon\Carbon;
use Vdhicts\ValidationRules\Rules\DateAfterOrEqual;
use Vdhicts\ValidationRules\Tests\TestCase;

class DateAfterOrEqualTest extends TestCase
{
    public function testRulePasses()
    {
        $date = Carbon::create(2018, 9, 1, 0, 0, 0);
        $rule = new DateAfterOrEqual($date);
        $this->assertTrue($rule->passes('', '2018-09-01'));
        $this->assertTrue($rule->passes('', '2018-09-21'));
    }

    public function testRuleFails()
    {
        $date = Carbon::create(2018, 9, 1);
        $rule = new DateAfterOrEqual($date);
        $this->assertFalse($rule->passes('', '2018-08-01'));
        $this->assertFalse($rule->passes('', 'test'));
    }
}
