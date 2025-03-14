<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class Semver extends AbstractRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @see https://regex101.com/r/vkijKf/1/
     * @see https://semver.org/
     */
    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        return Regex::match('/^(0|[1-9]\d*)\.(0|[1-9]\d*)\.(0|[1-9]\d*)(?:-((?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*)(?:\.(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*))*))?(?:\+([0-9a-zA-Z-]+(?:\.[0-9a-zA-Z-]+)*))?$/', $value)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.semver');
    }
}
