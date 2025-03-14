<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class BicNumber extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        return Regex::match('/^([a-zA-Z]){4}([a-zA-Z]){2}([0-9a-zA-Z]){2}([0-9a-zA-Z]{3})?$/', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.bic_number');
    }
}
