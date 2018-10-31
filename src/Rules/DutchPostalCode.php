<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class DutchPostalCode implements Rule
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
        return preg_match('/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', $value) != false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __('validationRules.dutch_postal_code');
    }
}
