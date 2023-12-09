<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Carbon\Carbon;
use Vdhicts\ValidationRules\Rules\DateBeforeOrEqual;
use Vdhicts\ValidationRules\Tests\TestCase;

class DateBeforeOrEqualTest extends TestCase
{
    public function testRulePasses(): void
    {
        $date = Carbon::create(2018, 9);
        $rule = new DateBeforeOrEqual($date);
        $this->assertTrue($rule->passes('2018-09-01'));
        $this->assertTrue($rule->passes('2018-08-21'));
    }

    public function testRuleFails(): void
    {
        $date = Carbon::create(2018, 9);
        $rule = new DateBeforeOrEqual($date);
        $this->assertFalse($rule->passes('2018-09-22'));
        $this->assertFalse($rule->passes('test'));
    }
}
