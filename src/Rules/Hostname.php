<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class Hostname extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        return Regex::match('/^(([a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.)*([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9])$/', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.hostname');
    }
}
