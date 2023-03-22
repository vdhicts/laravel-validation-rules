<?php

namespace Vdhicts\ValidationRules\Rules;

use Exception;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class DateHasSpecificMinutes implements Rule
{
    public function __construct(private readonly array $allowedMinutes, private readonly string $format = 'Y-m-d H:i')
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
        try {
            $date = Carbon::createFromFormat($this->format, $value);
        } catch (Exception $exception) {
            return false;
        }

        return in_array($date->minute, $this->allowedMinutes);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return trans('validationRules.date_has_specific_minutes', [
            'minutes' => implode(', ', $this->allowedMinutes),
        ]);
    }
}
