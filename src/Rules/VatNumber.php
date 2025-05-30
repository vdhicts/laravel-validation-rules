<?php

namespace Vdhicts\ValidationRules\Rules;

use Spatie\Regex\Regex;

class VatNumber extends AbstractRule
{
    /**
     * Regular expression patterns per country code.
     *
     * @see http://ec.europa.eu/taxation_customs/vies/faq.html?locale=en#item_11
     */
    private array $vatPatterns = [
        'AT' => 'U[A-Z\d]{8}',
        'BE' => '(0\d{9}|\d{10})',
        'BG' => '\d{9,10}',
        'CY' => '\d{8}[A-Z]',
        'CZ' => '\d{8,10}',
        'DE' => '\d{9}',
        'DK' => '(\d{2} ?){3}\d{2}',
        'EE' => '\d{9}',
        'EL' => '\d{9}',
        'ES' => '[A-Z]\d{7}[A-Z]|\d{8}[A-Z]|[A-Z]\d{8}',
        'FI' => '\d{8}',
        'FR' => '([A-Z]{2}|\d{2})\d{9}',
        'GB' => '\d{9}|\d{12}|(GD|HA)\d{3,4}',
        'HR' => '\d{11}',
        'HU' => '\d{8}',
        'IE' => '[A-Z\d]{8}|[A-Z\d]{9}',
        'IT' => '\d{11}',
        'LT' => '(\d{9}|\d{12})',
        'LU' => '\d{8}',
        'LV' => '\d{11}',
        'MT' => '\d{8}',
        'NL' => '\d{9}B\d{2}',
        'PL' => '\d{10}',
        'PT' => '\d{9}',
        'RO' => '\d{2,10}',
        'SE' => '\d{12}',
        'SI' => '\d{8}',
        'SK' => '\d{10}',
    ];

    public function passes(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $vatNumber = strtoupper($value);

        $country = substr($vatNumber, 0, 2);
        if (! array_key_exists($country, $this->vatPatterns)) {
            return false;
        }

        $number = str_replace(' ', '', substr($vatNumber, 2));

        return Regex::match('/^'.$this->vatPatterns[$country].'$/', $number)->hasMatch();
    }

    public function message(): string
    {
        return __('validationRules::messages.vat_number');
    }
}
