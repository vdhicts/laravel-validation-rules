<?php

namespace Vdhicts\ValidationRules\Rules;

use DateInterval;
use Exception;

class PositiveInterval extends AbstractRule
{
    /**
     * Checks if the date interval is positive.
     */
    private function isPositiveInterval(DateInterval $interval): bool
    {
        return
            // Minus sign for negative interval (more reliable then invert, which can be changed manually)
            $interval->format('%r') !== '-' &&
            // At least one value shouldn't be zero
            $interval->format('P%yY%mM%dDT%hH%iM%sS') !== 'P0Y0M0DT0H0M0S';
    }

    public function passes(mixed $value): bool
    {
        if ($value instanceof DateInterval) {
            return $this->isPositiveInterval($value);
        }

        try {
            $dateInterval = new DateInterval($value);

            return $this->isPositiveInterval($dateInterval);
        } catch (Exception) {
            return false;
        }
    }

    public function message(): string
    {
        return trans('validationRules.positive_interval');
    }
}
