<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class Price implements Rule
{
    public function __construct(private readonly ?string $decimalSign = null)
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
        $requiresDecimals = ! is_null($this->decimalSign);
        if (is_null($this->decimalSign)) {
            $decimalSign = '(,|\.)?';
        } else {
            $decimalSign = '('.($this->decimalSign === '.' ? '\.' : $this->decimalSign).')';
        }

        $pattern = sprintf(
            '/[\d]{1,}%s[\d|\-]{%d,}/',
            $decimalSign,
            $requiresDecimals ? 1 : 0
        );

        return preg_match($pattern, $value) != false;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        if (is_null($this->decimalSign)) {
            return __('validationRules.price');
        }

        return sprintf(
            __('validationRules.price_custom_decimal'),
            $this->decimalSign
        );
    }
}
