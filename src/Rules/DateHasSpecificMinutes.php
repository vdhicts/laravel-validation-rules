<?php

namespace Vdhicts\ValidationRules\Rules;

use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class DateHasSpecificMinutes implements Rule
{
    private array $allowedMinutes;
    private string $format;

    public function __construct(array $allowedMinutes, string $format = 'Y-m-d H:i')
    {
        $this->allowedMinutes = $allowedMinutes;
        $this->format = $format;
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
        try {
            $date = Carbon::createFromFormat($this->format, $value);
        } catch (InvalidFormatException $exception) {
            return false;
        }

        return in_array($date->minute, $this->allowedMinutes);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans('validationRules.date_has_specific_minutes', [
            'minutes' => implode(', ', $this->allowedMinutes)
        ]);
    }
}
