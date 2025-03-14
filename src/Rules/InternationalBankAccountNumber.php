<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class InternationalBankAccountNumber extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        return Regex::match('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}/', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.iban');
    }
}
