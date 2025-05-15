<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Support\Str;

class ContainsAny extends AbstractRule
{
    public function __construct(
        private readonly array $needles,
    ) {
    }

    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        return Str::contains($value, $this->needles);
    }

    public function message(): string
    {
        return __('validationRules::messages.contains_any', ['values' => implode(', ', $this->needles)]);
    }
}
