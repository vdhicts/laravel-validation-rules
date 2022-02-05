<?php

namespace Vdhicts\ValidationRules\Rules;

use DateTimeInterface;
use Illuminate\Contracts\Validation\Rule;

class DateAfterOrEqual implements Rule
{
    private DateTimeInterface $date;

    public function __construct(DateTimeInterface $date)
    {
        $this->date = $date;
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
        $limitTimestamp = $this
            ->date
            ->getTimestamp();

        return strtotime($value) >= $limitTimestamp;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return sprintf(
            __('validationRules.date_after_or_equal'),
            $this->date->format(DateTimeInterface::ISO8601)
        );
    }
}
