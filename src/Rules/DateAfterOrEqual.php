<?php

namespace Vdhicts\ValidationRules\Rules;

use DateTimeInterface;

class DateAfterOrEqual extends AbstractRule
{
    public function __construct(
        private readonly DateTimeInterface $date
    ) {}

    public function passes(mixed $value): bool
    {
        $limitTimestamp = $this
            ->date
            ->getTimestamp();

        return strtotime($value) >= $limitTimestamp;
    }

    public function message(): string
    {
        return sprintf(
            __('validationRules.date_after_or_equal'),
            $this->date->format('c')
        );
    }
}
