<?php

namespace Vdhicts\ValidationRules\Rules;

use DateInterval;
use Exception;

class Interval extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        // Empty string means 0 interval
        if ($value === '') {
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
