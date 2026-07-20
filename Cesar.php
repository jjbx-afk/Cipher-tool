<?php

function cesarCypher(string $userInput, array $alphabetArray, int $shiftChoice): string
{
    $resultArray = [];
    $userInput = strtolower($userInput);

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

        $newIndex = ($searchInArray + $shiftChoice) % count($alphabetArray);
        $resultArray[] = $alphabetArray[$newIndex];
    }

    return implode("", $resultArray);

}

function cesarDecypher(string $userInput, array $alphabetArray, int $shiftChoice): string
{
    $resultArray = [];
    $alphabetCount = count($alphabetArray);
    $userInput = strtolower($userInput);

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

        $newIndex = (($searchInArray - $shiftChoice) % $alphabetCount + $alphabetCount) % $alphabetCount;
        $resultArray[] = $alphabetArray[$newIndex];
        
    }
    return implode("", $resultArray);
}