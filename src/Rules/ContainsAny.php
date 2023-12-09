<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Support\Str;

class ContainsAny extends AbstractRule
{
    public function __construct(
        private readonly array $needles
    ) {
    }

    public function passes(mixed $value): bool
    {
        return Str::contains($value, $this->needles);
    }

    public function message(): string
    {
        return sprintf(
            __('validationRules.contains_any'),
            implode(', ', $this->needles)
        );
    }
}
