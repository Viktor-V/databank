<?php

declare(strict_types=1);

namespace DataBank\Service;

final class PrimeNumber
{
    public function isPrime(int $number): bool
    {
        if ($number <= 1) {
            return false;
        }

        $i = 2;
        while ($i <= $number / 2) {
            if ($number % $i === 0) {
                return false;
            }

            $i++;
        }

        return true;
    }
}
