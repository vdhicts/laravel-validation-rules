<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class DutchPhone extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        return Regex::match('/^(\+|00|0)(31\s?)?(6[\s-]?[1-9][0-9]{7}|[1-9][0-9][\s-]?[1-9][0-9]{6}|[1-9][0-9]{2}[\s-]?[1-9][0-9]{5})$/', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.dutch_phone');
    }
}
