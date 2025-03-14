<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Support\Str;

class NotContains extends AbstractRule
{
    public function __construct(
        private readonly string $needle = ''
    ) {}

    public function passes(mixed $value): bool
    {
        if ($this->needle === '') {
            return true;
        }

        return ! Str::contains($value, $this->needle);
    }

    public function message(): string
    {
        return __('validationRules::messages.not_contains', ['value' => $this->needle]);
    }
}
