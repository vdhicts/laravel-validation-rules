<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

/**
 * @deprecated use the builtin `hex_color`, see: https://laravel.com/docs/10.x/validation#rule-hex-color
 */
class HexColor extends AbstractRule
{
    public function passes(mixed $value): bool
    {
        return Regex::match('/^#?[a-fA-F0-9]{3,6}$/', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules.hex_color');
    }
}
