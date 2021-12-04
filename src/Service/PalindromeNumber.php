<?php

declare(strict_types=1);

namespace DataBank\Service;

final class PalindromeNumber
{
    public function isPalindrome(int $number): bool
    {
        $flippedNumber = (int) strrev((string) $number);

        return $number === $flippedNumber;
    }
}
