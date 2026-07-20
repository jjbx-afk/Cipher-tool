<?php

function affineModInverse(int $a, int $m = 26): ?int
{
    for ($x = 1; $x < $m; $x++) {
        if (($a * $x) % $m === 1) {
            return $x;
        }
    }
    return null;
}

function affineCypher(string $userInput, array $alphabetArray, int $firstKey, int $secondKey): string
{
    $resultArray = [];
    $alphabetCount = count($alphabetArray);
    $coPrimes = [1, 3, 5, 7, 9, 11, 15, 17, 19, 21, 23, 25];

    if (!in_array($firstKey, $coPrimes)) {
        echo "First key must be coprime with 26! Use one of: " . implode(", ", $coPrimes);
        exit;
    }

    foreach (str_split($userInput) as $character) {
        if ($character === " ") {
            $resultArray[] = " ";
            continue;
        }

        $searchInArray = array_search($character, $alphabetArray, true);
        if ($searchInArray === false) {
            $resultArray[] = $character;
            continue;
        }

        $encoded = (($firstKey * $searchInArray) + $secondKey) % $alphabetCount;
        $resultArray[] = $alphabetArray[$encoded];
    }

    return implode("", $resultArray);
}

function affineDecypher(string $userInput, array $alphabetArray, int $firstKey, int $secondKey): string
{
    $resultArray = [];
    $alphabetCount = count($alphabetArray);

    $modInverse = affineModInverse($firstKey, $alphabetCount);
    if ($modInverse === null) {
        echo "First key has no modular inverse!";
        exit;
    }

    foreach (str_split($userInput) as $character) {
        if ($character === " ") {
            $resultArray[] = " ";
            continue;
        }

        $searchInArray = array_search($character, $alphabetArray, true);
        if ($searchInArray === false) {
            $resultArray[] = $character;
            continue;
        }

        $decoded = ($modInverse * ($searchInArray - $secondKey)) % $alphabetCount;
        if ($decoded < 0) {
            $decoded += $alphabetCount;
        }
        $resultArray[] = $alphabetArray[$decoded];
    }

    return implode("", $resultArray);
}

