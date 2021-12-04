<?php

declare(strict_types=1);

namespace DataBank\Tests\Service;

use DataBank\Service\PrimeNumber;
use PHPUnit\Framework\TestCase;

class PrimeNumberTest extends TestCase
{
    private const PRIME_NUMBERS = [
        2,
        3,
        5,
        7,
        11,
        13,
        17,
        19,
        23,
        29,
        31,
        37,
        41,
        43,
        47,
        53,
        59,
        61,
        67,
        71,
        73,
        79,
        83,
        89,
        97
    ];

    public function testPrimeNumber(): void
    {
        $prime = new PrimeNumber();

        foreach (range(1, 100) as $number) {
            in_array($number, self::PRIME_NUMBERS, true)
                ? self::assertTrue($prime->isPrime($number))
                : self::assertFalse($prime->isPrime($number));
        }
    }
}
