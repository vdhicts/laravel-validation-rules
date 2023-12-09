<?php

namespace Vdhicts\ValidationRules\Rules;

use Closure;
use Vdhicts\ValidationRules\Contracts\Rule;

abstract class AbstractRule implements Rule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->passes($value) === false) {
            $fail($this->message());
        }
    }
}
