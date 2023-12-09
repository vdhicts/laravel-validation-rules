<?php

namespace Vdhicts\ValidationRules\Contracts;

use Illuminate\Contracts\Validation\ValidationRule;

interface Rule extends ValidationRule
{
    public function passes(mixed $value): bool;

    public function message(): string;
}
