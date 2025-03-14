<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class MimeType extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        return Regex::match('/^\w+\/[-+.\w]+$/', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.mime_type');
    }
}
