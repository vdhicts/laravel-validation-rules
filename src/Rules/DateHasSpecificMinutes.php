<?php

namespace Vdhicts\ValidationRules\Rules;

use Exception;
use Illuminate\Support\Carbon;

class DateHasSpecificMinutes extends AbstractRule
{
    /**
     * @param int[] $allowedMinutes
     */
    public function __construct(
        private readonly array $allowedMinutes,
        private readonly string $format = 'Y-m-d H:i'
    ) {
    }

    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        try {
            $date = Carbon::createFromFormat($this->format, $value);
        } catch (Exception) {
            return false;
        }

        return in_array($date->minute, $this->allowedMinutes, true);
    }

    public function message(): string
    {
        return __('validationRules::messages.date_has_specific_minutes', [
            'minutes' => implode(', ', $this->allowedMinutes),
        ]);
    }
}
