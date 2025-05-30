<?php

namespace Vdhicts\ValidationRules\Rules;

use DateInterval;
use Exception;

class Interval extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        // Empty string means 0 interval
        if (empty($value)) {
            $value = 'P0Y';
        }
        try {
            new DateInterval($value);

            return true;
        } catch (Exception) {
            return false;
        }
    }

    public function message(): string
    {
        return __('validationRules::messages.interval');
    }
}
