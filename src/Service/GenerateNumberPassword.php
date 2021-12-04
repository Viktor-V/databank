<?php

declare(strict_types=1);

namespace DataBank\Service;

use RuntimeException;

final class GenerateNumberPassword
{
    public const MIN_PASSWORD_LENGTH = 3;

    public function __construct(
        private array $numbers
    ) {
    }

    public function generate(int $length): string
    {
        if ($length < self::MIN_PASSWORD_LENGTH) {
            throw new RuntimeException(
                sprintf('Cannot generate password that is less than %s chars', self::MIN_PASSWORD_LENGTH)
            );
        }

        return $this->slice(implode($this->randomize($this->numbers)), $length);
    }

    /**
     * Using Fisher–Yates shuffle Algorithm
     * @see https://en.wikipedia.org/wiki/Fisher%E2%80%93Yates_shuffle
     */
    private function randomize(array $numbers): array
    {
        for ($index = count($numbers) - 1; $index >= 0; $index--) {
            $randomIndex = random_int(0, $index);

            $temporary = $numbers[$index];
            $numbers[$index] = $numbers[$randomIndex];
            $numbers[$randomIndex] = $temporary;
        }

        return $numbers;
    }

    private function slice(string $randomizedPassword, int $length): string
    {
        if (strlen($randomizedPassword) < $length) {
            throw new RuntimeException('Cannot slice too small password.');
        }

        return substr($randomizedPassword, 0, $length);
    }
}
