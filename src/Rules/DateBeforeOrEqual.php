<?php

namespace Vdhicts\ValidationRules\Rules;

use DateTimeInterface;

class DateBeforeOrEqual extends AbstractRule
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

        $providedTimestamp = strtotime($value);
        if (! $providedTimestamp) {
            return false;
        }

        return strtotime($value) <= $limitTimestamp;
    }

    public function message(): string
    {
        return __('validationRules::messages.date_before_or_equal', ['date' => $this->date->format('c')]);
    }
}
