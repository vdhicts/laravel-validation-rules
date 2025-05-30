<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class Phone extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $validationRegex = sprintf(
            '/^\+?(%1$s)? ?(?(?=\()(\(%2$s\) ?%3$s)|([. -]?(%2$s[. -]*)?%3$s))$/',
            '\d{0,3}',
            '\d{1,3}',
            '((\d{3,5})[. -]?(\d{4})|(\d{2}[. -]?){4})'
        );

        return Regex::match($validationRegex, $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.phone');
    }
}
