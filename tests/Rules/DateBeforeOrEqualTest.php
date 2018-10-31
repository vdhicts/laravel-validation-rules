<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Carbon\Carbon;
use Vdhicts\ValidationRules\Tests\TestCase;
use Vdhicts\ValidationRules\Rules\DateBeforeOrEqual;

class DateBeforeOrEqualTest extends TestCase
{
    public function testRulePasses()
    {
        $date = Carbon::create(2018, 9, 1, 0, 0, 0);
        $rule = new DateBeforeOrEqual($date);
        $this->assertTrue($rule->passes('', '2018-09-01'));
        $this->assertTrue($rule->passes('', '2018-08-21'));
    }

    public function testRuleFails()
    {
        $date = Carbon::create(2018, 9, 1);
        $rule = new DateBeforeOrEqual($date);
        $this->assertFalse($rule->passes('', '2018-09-22'));
        $this->assertFalse($rule->passes('', 'test'));
    }
}
