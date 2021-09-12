# Laravel Validation Rules

This package offers extra validation rules for Laravel.

## Requirements

This package requires Laravel 5.7+ and PHP 7.4+.

| Version | Compatible with |
| --- | --- |
| 1.4.0 | 8+ |
| 1.2.0 | 7+ |
| 1.1.0 | 6+ |
| 1.0.1 | 5.7+ |

## Installation

You can install the package via composer:

`composer require vdhicts/laravel-validation-rules`

The package will automatically register itself in Laravel.
 
## Translation

The package includes both English and Dutch translations. The translations can be published by running:

`php artisan vendor:publish`

## Available Rules

### BicNumber

Validates the provided [BIC number](https://www.betaalvereniging.nl/en/focus/giro-based-and-online-payments/bank-identifier-code-bic-for-sepa-transactions/).

### Contains

Validates if the value contains a certain phrase.

```php
'field' => [new Contains($needle)],
```

### DateAfterOrEqual

Validates if the value is a date after or equals the provided date (Carbon).

```php
'field' => [new DateAfterOrEqual($date)],
```

### DateBeforeOrEqual

Validates if the value is a date before or equals the provided date (Carbon).

```php
'field' => [new DateBeforeOrEqual($date)],
```

### DutchPhone

Validates if the value is a valid dutch phone number. Both mobile or landlines are supported. See the `Phone` validation
rule to validate a phone number which isn't limited to the Netherlands.

### DutchPostalCode

Validates if the value is a valid dutch zip code, like `1234AB`.

### HexColor

Validates if the value contains a hex color, like `#000000`.

### HostName

Validates if the value contains a valid hostname, like `example.com`.

### InternationalBankAccountNumber

Validates if the value contains a valid [IBAN](https://en.wikipedia.org/wiki/International_Bank_Account_Number).

### MaximumHourDifference

Validates if the value is differing less then the provided amount of hours.

```php
'field' => [new MaximumHourDifference($start, 10)];
```

### NotContains

Validates if the value *NOT* contains a certain phrase.

```php
'field' => [new NotContains($needle)],
```

### NotEndsWith

Validates if the value *NOT* ends with a certain phrase.

```php
'field' => [new NotEndsWith($needle)],
```

### NotStartsWith

Validates if the value *NOT* starts with a certain phrase.

```php
'field' => [new NotEndsWith($needle)],
```

### Phone

Validates if the value is a valid phone number.

### Price

Validates if the value is a valid price. The rule optionally accepts a specific decimal sign. When the decimal isn't 
provided it accepts both `,` or `.` signs.

```php
'field' => [new Price()], // accepts both , and .
'field' => [new Price(',')], // accepts only ,
```

### Semver

Validates if the value is a valid version according to the [Semver](https://semver.org/) standard.

### VatNumber

Validates if the value is a valid formatted VAT number. 

**Be aware**: It doesn't check if the number is known in the VAT database. If you need to know the VAT number is truly 
legit, I'm currently offering an easy to use (paid) service for that.

## Contribution

Any contribution is welcome, but it should be (unit) tested and meet the PSR-2 standard and please create one pull 
request per feature. In exchange you will be credited as contributor on this page.

## Security

If you discover any security related issues in this or other packages of Vdhicts, please email security@vdhicts.nl 
instead of using the issue tracker.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## About vdhicts

[Vdhicts](https://www.vdhicts.nl) is the name of my personal company. Vdhicts develops and implements IT solutions for
businesses and educational institutions.
