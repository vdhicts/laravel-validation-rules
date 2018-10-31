<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class Contains implements Rule
{
    /**
     * @var string
     */
    private $needle;

    /**
     * Contains constructor.
     *
     * @param string $needle
     */
    public function __construct(string $needle = '')
    {
        $this->needle = $needle;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (trim($this->needle) === '') {
            return false;
        }

        return str_contains($value, $this->needle);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return sprintf(
            __('validationRules.contains'),
            $this->needle
        );
    }
}
