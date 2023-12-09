<?php

namespace Vdhicts\ValidationRules\Rules;

use Carbon\Carbon;
use DateTimeInterface;
use Exception;

class MaximumHourDifference extends AbstractRule
{
    public function __construct(
        private readonly DateTimeInterface $date,
        private readonly int $hours = 24
    ) {
    }

    public function passes(mixed $value): bool
    {
        try {
            $end = new Carbon($value);
        } catch (Exception) {
            return false;
        }

        $diffInMinutes = $end->diffInRealMinutes($this->date);

        return ($diffInMinutes / 60) <= $this->hours;
    }

    public function message(): string
    {
        return sprintf(
            __('validationRules.maximum_hour_difference'),
            $this->hours
        );
    }
}
