<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class HexColor implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^#?[a-fA-F0-9]{3,6}$/', $value) != false;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validationRules.hex_color');
    }
}
