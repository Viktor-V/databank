<?php

declare(strict_types=1);

namespace DataBank\Tests\Service;

use DataBank\Service\PalindromeNumber;
use PHPUnit\Framework\TestCase;

class PalindromeNumberTest extends TestCase
{
    public function testPalindrome(): void
    {
        $palindrome = new PalindromeNumber();

        self::assertTrue($palindrome->isPalindrome(1));
        self::assertTrue($palindrome->isPalindrome(11));
        self::assertTrue($palindrome->isPalindrome(101));
        self::assertTrue($palindrome->isPalindrome(1001));
        self::assertFalse($palindrome->isPalindrome(1231));
    }
}
