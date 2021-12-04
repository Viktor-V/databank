<?php

declare(strict_types=1);

namespace DataBank\Tests\Service;

use DataBank\Service\GenerateNumberPassword;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class GenerateNumberPasswordTest extends TestCase
{
    public function testSuccessfullyGeneratePassword(): void
    {
        $length = 5;

        $generatePassword = new GenerateNumberPassword([0, 1, 2, 4, 5, 5, 7]);
        self::assertEquals($length, strlen($test = $generatePassword->generate($length)));
    }

    public function testPasswordLengthIsTooSmall(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(sprintf(
            'Cannot generate password that is less than %s chars', GenerateNumberPassword::MIN_PASSWORD_LENGTH
        ));

        $generatePassword = new GenerateNumberPassword([0, 1, 2, 4, 5, 5, 7]);
        $generatePassword->generate(1);
    }

    public function testSliceTooSmallPassword(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Cannot slice too small password.');

        $generatePassword = new GenerateNumberPassword([0, 1, 2, 4, 5, 5, 7]);
        $generatePassword->generate(10);
    }
}
