<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\DateHasSpecificMinutes;
use Vdhicts\ValidationRules\Tests\TestCase;

class DateHasSpecificMinutesTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new DateHasSpecificMinutes([0, 10, 20, 30, 40, 55]);
        $this->assertTrue($rule->passes('', '2021-09-30 00:00'));
        $this->assertTrue($rule->passes('', '2021-09-30 01:10'));
        $this->assertTrue($rule->passes('', '2021-09-30 01:20'));
        $this->assertTrue($rule->passes('', '2021-09-30 01:30'));
        $this->assertTrue($rule->passes('', '2021-09-30 01:40'));
        $this->assertTrue($rule->passes('', '2021-09-30 01:55'));

        $rule = new DateHasSpecificMinutes([0, 15, 30, 45], 'd-m-Y H:i');
        $this->assertTrue($rule->passes('', '30-09-2021 09:30'));
    }

    public function testRuleFails()
    {
        $rule = new DateHasSpecificMinutes([0, 10, 20, 30, 40, 55]);
        $this->assertFalse($rule->passes('', 'lol'));
        $this->assertFalse($rule->passes('', '2021-09-30 01:01'));
        $this->assertFalse($rule->passes('', '2021-09-30 01:02'));

        $rule = new DateHasSpecificMinutes([0, 15, 30, 45], 'd-m-Y H:i');
        $this->assertFalse($rule->passes('', 'lol'));
        $this->assertFalse($rule->passes('', '30-09-2021 09:17'));
    }
}
