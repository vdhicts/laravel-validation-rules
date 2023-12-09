<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class Price extends AbstractRule
{
    public function __construct(
        private readonly ?string $decimalSign = null
    ) {
    }

    public function passes(mixed $value): bool
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

        return Regex::match($pattern, $value)->hasMatch();
    }

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
