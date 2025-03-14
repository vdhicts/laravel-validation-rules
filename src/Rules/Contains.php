<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Support\Str;

class Contains extends AbstractRule
{
    public function __construct(
        private readonly string $needle = ''
    ) {}

    public function passes(mixed $value): bool
    {
        if (trim($this->needle) === '') {
            return false;
        }

        return Str::contains($value, $this->needle);
    }

    public function message(): string
    {
        return __('validationRules::messages.contains', ['value' => $this->needle]);
    }
}
