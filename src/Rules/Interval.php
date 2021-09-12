<?php

namespace Vdhicts\ValidationRules\Rules;

use DateInterval;
use Exception;
use Illuminate\Contracts\Validation\Rule;

class Interval implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        // Empty string means 0 interval
        if ($value === '') {
            $value = 'P0Y';
        }
        try {
            new DateInterval($value);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans('validationRules.interval');
    }
}
