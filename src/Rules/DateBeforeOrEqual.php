<?php

namespace Vdhicts\ValidationRules\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class DateBeforeOrEqual implements Rule
{
    /**
     * Holds the needle.
     *
     * @var string
     */
    private $date;

    /**
     * DateAfterOrEqual constructor.
     *
     * @param Carbon $date
     */
    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
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

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return sprintf(
            __('validationRules.date_before_or_equal'),
            $this->date->toIso8601String()
        );
    }
}
