<?php

namespace Vdhicts\ValidationRules\Rules;

use DateTimeInterface;

class DateAfterOrEqual extends AbstractRule
{
    public function __construct(
        private readonly DateTimeInterface $date
    ) {
    }

    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $limitTimestamp = $this
            ->date
            ->getTimestamp();

        return strtotime($value) >= $limitTimestamp;
    }

    public function message(): string
    {
        return __('validationRules::messages.date_after_or_equal', ['date' => $this->date->format('c')]);
    }
}
