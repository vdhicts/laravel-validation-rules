<?php

namespace Vdhicts\ValidationRules\Rules;

use DateTimeInterface;

class DateBeforeOrEqual extends AbstractRule
{
    public function __construct(
        private readonly DateTimeInterface $date
    ) {}

    public function passes(mixed $value): bool
    {
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
        return sprintf(
            __('validationRules.date_before_or_equal'),
            $this->date->format('c')
        );
    }
}
