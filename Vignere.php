<?php

function vigenereCypher(string $userInput, array $alphabetArray, string $keyword): string
{
    if (empty($keyword)) {
        return $userInput;
    }

    $keyword = strtolower($keyword);
    $resultArray = [];
    $keyIndex = 0;
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

        $keyChar = $keyword[$keyIndex % strlen($keyword)];
        $keyShift = array_search($keyChar, $alphabetArray, true);

        if ($keyShift === false) {
            $keyShift = 0;
        }

        $newIndex = ($searchInArray + $keyShift) % $alphabetCount;
        $resultArray[] = $alphabetArray[$newIndex];
        $keyIndex++;
    }

    return implode("", $resultArray);
}

function vigenereDecypher(string $userInput, array $alphabetArray, string $keyword): string
{
    if (empty($keyword)) {
        return $userInput;
    }

    $keyword = strtolower($keyword);
    $resultArray = [];
    $keyIndex = 0;
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

        $keyChar = $keyword[$keyIndex % strlen($keyword)];
        $keyShift = array_search($keyChar, $alphabetArray, true);

        if ($keyShift === false) {
            $keyShift = 0;
        }

        $newIndex = (($searchInArray - $keyShift) % $alphabetCount + $alphabetCount) % $alphabetCount;
        $resultArray[] = $alphabetArray[$newIndex];
        $keyIndex++;
    }

    return implode("", $resultArray);
}