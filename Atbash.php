<?php

function atbashCypher(string $userInput, array $alphabetArray): string
{
    $resultArray = [];
    $alphabetCount = count($alphabetArray);

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

        $newIndex = $alphabetCount - 1 - $searchInArray;
        $resultArray[] = $alphabetArray[$newIndex];
    }

    return implode("", $resultArray);
}

function atbashDecypher(string $userInput, array $alphabetArray): string
{
    // Atbash is symmetric: encoding and decoding are the same operation
    return atbashCypher($userInput, $alphabetArray);
}