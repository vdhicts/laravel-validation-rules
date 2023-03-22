<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ContainsAny implements Rule
{
    public function __construct(private readonly array $needles)
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     */
    public function passes($attribute, $value): bool
    {
        return Str::contains($value, $this->needles);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return sprintf(
            __('validationRules.contains_any'),
            implode(', ', $this->needles)
        );
    }
}
