<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class SecureUrl extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        return Regex::match('/^https:\/\/[a-z0-9-]{1,63}(\.[a-z0-9-]{1,63})+(\/\S*)?$/', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.secure_url');
    }
}
