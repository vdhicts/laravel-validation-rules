<?php

namespace Vdhicts\ValidationRules\Rules;

use DateTimeInterface;
use Illuminate\Contracts\Validation\Rule;

class DateAfterOrEqual implements Rule
{
    public function __construct(private readonly DateTimeInterface $date)
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
        $limitTimestamp = $this
            ->date
            ->getTimestamp();

        return strtotime($value) >= $limitTimestamp;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return sprintf(
            __('validationRules.date_after_or_equal'),
            $this->date->format(DateTimeInterface::ISO8601)
        );
    }
}
