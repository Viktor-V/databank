<?php

require_once __DIR__ . '/vendor/autoload.php';

$options = getopt('', ['rangeLength:', 'passwordLength:']);
if (!isset($options['rangeLength'])) {
    echo "Range length is required\n";

    return;
}

if (!isset($options['passwordLength'])) {
    echo "Range length is required\n";

    return;
}

$range = range(1, (int) $options['rangeLength']);

$primeNumberService = new \DataBank\Service\PrimeNumber();
$palindromeNumberService = new \DataBank\Service\PalindromeNumber();

$primeNumbers = $palindromeNumbers = [];
foreach ($range as $number) {
    if ($primeNumberService->isPrime($number)) {
        $primeNumbers[] = $number;
    }

    if ($palindromeNumberService->isPalindrome($number)) {
        $palindromeNumbers[] = $number;
    }
}
echo sprintf("Prime numbers: %s \n\n", implode(' ', $primeNumbers));
echo sprintf("Palindrome numbers: %s \n\n", implode(' ', $palindromeNumbers));

$generatePasswordService = new \DataBank\Service\GenerateNumberPassword($primeNumbers);

echo sprintf("Generated password: %s \n\n", $generatePasswordService->generate((int) $options['passwordLength']));

