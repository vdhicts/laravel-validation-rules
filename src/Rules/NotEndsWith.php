<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

/**
 * @deprecated use the builtin `doesnt_end_with`
 */
class NotEndsWith implements Rule
{
    private string $needle;

    public function __construct(string $needle = '')
    {
        $this->needle = $needle;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (trim($this->needle) === '') {
            return true;
        }

        return !Str::endsWith($value, $this->needle);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return sprintf(
            __('validationRules.not_ends_with'),
            $this->needle
        );
    }
}
