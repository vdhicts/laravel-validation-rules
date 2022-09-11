<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

/**
 * @deprecated use the builtin `Password`. A drop in replacement: `Password::min(8)->mixedCase()->numbers()`
 */
final class PasswordStrength implements Rule
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
        // Password must be at least 8 characters long
        if (Str::length($value) < 8) {
            return false;
        }

        // Password must contain at least one capital character
        if (preg_match('/[A-Z]/', $value) == false) {
            return false;
        }

        // Password must contain at least one lower case character
        if (preg_match('/[a-z]/', $value) == false) {
            return false;
        }

        // Password must contain at least one number
        return preg_match('/\d/', $value) != false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans('validationRules.password_strength');
    }
}
