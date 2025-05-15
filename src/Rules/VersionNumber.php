<?php

namespace Vdhicts\ValidationRules\Rules;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Spatie\Regex\Regex;

class VersionNumber extends AbstractRule
{
    public function __construct(
        private readonly bool $requirePatch = false,
    ) {
    }

    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $pattern = Str::of('(\d{1,})\.(\d{1,})')
            ->when(
                $this->requirePatch,
                fn (Stringable $pattern) => $pattern->append('\.(\d{1,})'),
                fn (Stringable $pattern) => $pattern->append('\.?(\d{1,})?')
            );

        return Regex::match('/^'.$pattern.'$/', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.version');
    }
}
