<?php

namespace Vdhicts\ValidationRules\Tests\Rules;

use PHPUnit\Framework\Attributes\DataProvider;
use Vdhicts\ValidationRules\Rules\MimeType;
use Vdhicts\ValidationRules\Tests\TestCase;

class MimeTypeTest extends TestCase
{
    public static function validMimeTypes(): array
    {
        return [
            ['image/jpeg'],
            ['text/plain'],
            ['application/json'],
        ];
    }

    public static function invalidMimeTypes(): array
    {
        return [
            ['test'],
            [123],
            [false],
            [null],
            [''],
        ];
    }

    #[DataProvider('validMimeTypes')]
    public function test_rule_passes(string $mimeType): void
    {
        $rule = new MimeType();

        $this->assertTrue($rule->passes($mimeType));
    }

    #[DataProvider('invalidMimeTypes')]
    public function test_rule_fails(mixed $mimeType): void
    {
        $rule = new MimeType();

        $this->assertFalse($rule->passes($mimeType));
    }
}
