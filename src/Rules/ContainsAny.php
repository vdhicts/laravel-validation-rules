<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Support\Str;

class ContainsAny extends AbstractRule
{
    public function __construct(
        private readonly array $needles
    ) {}

    public function passes(mixed $value): bool
    {
        return Str::contains($value, $this->needles);
    }

    public function message(): string
    {
        return __('validationRules::messages.contains_any', ['values' => implode(', ', $this->needles)]);
    }
}
