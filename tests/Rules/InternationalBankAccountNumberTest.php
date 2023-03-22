<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\InternationalBankAccountNumber;
use Vdhicts\ValidationRules\Tests\TestCase;

class InternationalBankAccountNumberTest extends TestCase
{
    public function testRulePasses()
    {
        $rule = new InternationalBankAccountNumber();
        $this->assertTrue($rule->passes('', 'GR1601101250000000012300695'));
        $this->assertTrue($rule->passes('', 'MU17BOMM0101101030300200000MUR'));
        $this->assertTrue($rule->passes('', 'NL91ABNA0417164300'));
    }

    public function testRuleFails()
    {
        $rule = new InternationalBankAccountNumber();
        $this->assertFalse($rule->passes('', '1234 no iban here'));
    }
}
