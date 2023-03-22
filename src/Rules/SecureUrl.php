<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class SecureUrl implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     */
    public function passes($attribute, $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        return preg_match('/^https:\/\/[a-z0-9-]{1,63}(\.[a-z0-9-]{1,63})+(\/\S*)?$/', $value) === 1;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return trans('validationRules.secure_url');
    }
}
