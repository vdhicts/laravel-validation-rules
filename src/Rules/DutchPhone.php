<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class DutchPhone implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(\+|00|0)(31\s?)?(6[\s-]?[1-9][0-9]{7}|[1-9][0-9][\s-]?[1-9][0-9]{6}|[1-9][0-9]{2}[\s-]?[1-9][0-9]{5})$/', $value) != false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __('validationRules.dutch_phone');
    }
}
