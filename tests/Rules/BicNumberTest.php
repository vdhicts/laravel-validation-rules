<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use Vdhicts\ValidationRules\Rules\BicNumber;
use Vdhicts\ValidationRules\Tests\TestCase;

class BicNumberTest extends TestCase
{
    public function test_rule_passes(): void
    {
        $rule = new BicNumber();
        $validValues = [
            'RBOSGGSX',
            'RZTIAT22263',
            'BCEELULL',
            'MARKDEFF',
            'GENODEF1JEV',
            'UBSWCHZH80A',
            'CEDELULLXXX',
        ];
        foreach ($validValues as $validValue) {
            $this->assertTrue($rule->passes($validValue), $validValue);
        }
    }

    public function test_rule_fails(): void
    {
        $rule = new BicNumber();
        $this->assertFalse($rule->passes('CE1EL2LLFFF'));
        $this->assertFalse($rule->passes('E31DCLLFFF'));
    }
}
