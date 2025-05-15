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
        if (empty($value) || ! is_string($value)) {
            return false;
        }

        $requiresDecimals = $this->decimalSign !== null;
        if ($this->decimalSign === null) {
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
        return $this->decimalSign === null
            ? __('validationRules::messages.price')
            : __('validationRules::messages.price_custom_decimal', ['separator' => $this->decimalSign]);
    }
}
