<?php

namespace Vdhicts\ValidationRules\Rules;

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Validation\Rule;

class MaximumHourDifference implements Rule
{
    /**
     * Holds the needle.
     *
     * @var string
     */
    private $date;

    /**
     * Holds the maximum hours difference.
     *
     * @var int
     */
    private $hours = 24;

    /**
     * DateAfterOrEqual constructor.
     *
     * @param Carbon $date
     * @param int $hours
     */
    public function __construct(Carbon $date, int $hours = 24)
    {
        $this->date = $date;
        $this->hours = $hours;
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
        try {
            $end = new Carbon($value);
        } catch (Exception $e) {
            return false;
        }

        $diffInMinutes = $end->diffInRealMinutes($this->date);

        return ($diffInMinutes / 60) <= $this->hours;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return sprintf(
            __('validationRules.maximum_hour_difference'),
            $this->hours
        );
    }
}
