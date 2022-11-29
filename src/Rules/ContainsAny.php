<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ContainsAny implements Rule
{
    private array $needles;

    public function __construct(array $needles)
    {
        $this->needles = $needles;
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
        return Str::contains($value, $this->needles);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return sprintf(
            __('validationRules.contains_any'),
            implode(', ', $this->needles)
        );
    }
}
