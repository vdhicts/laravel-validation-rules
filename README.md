# Laravel Validation Rules

This package offers extra validation rules for Laravel.

## Requirements

This package requires Laravel 11+ and PHP 8.2+. If you need to support older version, see the table below:

| Version | Compatible with |
|---------|-----------------|
| 7.0.0   | 12+             |
| 6.0.0   | 11+             |
| 4.0.0+  | 10+             |
| 3.0.0   | 9+              |
| 1.4.0+  | 8+              |
| 1.2.0+  | 7+              |
| 1.1.0   | 6+              |
| 1.0.1   | 5.7+            |

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

```php
'field' => [new BicNumber()],
```

### Contains

Validates if the value contains a certain phrase.

```php
'field' => [new Contains($needle)],
```

### ContainsAny

Validates if the value contains any of the provided phrases.

```php
'field' => [new ContainsAny(['foo', 'bar'])],
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

### DateHasSpecificMinutes

Validates if the selected minutes for the provided date are according to the available minutes.

```php
'field' => [new DateHasSpecificMinutes([0, 15, 30, 45])],
```

When the date is not according to the 'Y-m-d H:i' format then you are able to specify the format as second parameter:

```php
'field' => [new DateHasSpecificMinutes([0, 15, 30, 45], 'd-m-Y H:i')],
```

### DutchPhone

Validates if the value is a valid Dutch phone number. Both mobile or landlines are supported. See the `Phone` validation
rule to validate a phone number which isn't limited to the Netherlands.

```php
'field' => [new DutchPhone()],
```

### DutchPostalCode

Validates if the value is a valid Dutch zip code, like `1234AB`.

```php
'field' => [new DutchPostalCode()],
```

### HostName

Validates if the value contains a valid hostname, like `example.com`.

```php
'field' => [new HostName()],
```

### InternationalBankAccountNumber

Validates if the value contains a valid [IBAN](https://en.wikipedia.org/wiki/International_Bank_Account_Number).

```php
'field' => [new InternationalBankAccountNumber()],
```

### Interval

Validates if the value is an interval, i.e. `PT30S`.

```php
'field' => [new Interval()],
```

### MaximumHourDifference

Validates if the value is differing less then the provided amount of hours.

```php
'field' => [new MaximumHourDifference($start, 10)];
```

### Mime Type

Validates if the value is a structural valid MIME.

```php
'field' => [new MimeType()],
```

### NotContains

Validates if the value *NOT* contains a certain phrase.

```php
'field' => [new NotContains($needle)],
```

### Phone

Validates if the value is a valid phone number.

```php
'field' => [new Phone()],
```

### Positive interval

Validates if the value is an interval and the interval is positive.

```php
'field' => [new PositiveInterval()],
```

### Price

Validates if the value is a valid price. The rule optionally accepts a specific decimal sign. When the decimal isn't 
provided it accepts both `,` or `.` signs.

```php
'field' => [new Price()], // accepts both , and .
'field' => [new Price(',')], // accepts only ,
```

### Secure url

Validates if the value is a valid secure url, i.e. is a HTTPS url.

```php
'field' => [new SecureUrl()],
```

### Semver

Validates if the value is a valid version according to the [Semver](https://semver.org/) standard.

```php
'field' => [new Semver()],
```

### VatNumber

Validates if the value is a properly formatted VAT number. 

```php
'field' => [new VatNumber()],
```

**Be aware**: It doesn't check if the number is known in the VAT database. If you need to know the VAT number is truly 
legit, check with [VIES](https://ec.europa.eu/taxation_customs/vies/#/vat-validation).

### VersionNumber

Validates if the value is a valid version number. The rule accepts both `x.y.z` and `x.y` formats. The parameter 
`requirePatch` allows you to require the `z` part of the version number. This is useful for validation PHP version 
numbers for example.

```php
'field' => [new VersionNumber(requirePatch: true)],
```

## Contribution

Any contribution is welcome, but it should be (unit) tested and meet the PSR-12 standard and please create one pull 
request per feature. In exchange, you will be credited as contributor on this page.

## Security

If you discover any security related issues in this or other packages of Vdhicts, please email security@vdhicts.nl 
instead of using the issue tracker.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
