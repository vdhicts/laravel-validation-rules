<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class DutchPostalCode extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        return Regex::match('/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules.dutch_postal_code');
    }
}
