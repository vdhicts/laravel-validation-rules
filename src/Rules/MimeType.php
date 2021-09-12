<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

final class MimeType implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return preg_match('/^\w+\/[-+.\w]+$/', $value) === 1;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return trans('validationRules.mime_type');
    }
}
