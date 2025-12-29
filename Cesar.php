<?php

$alphabetArray = range('a', 'z');

function cesarCypher($userInput, $alphabetArray, $shiftChoice)
{

    $resultArray = [];
    
    foreach (str_split($userInput) as $character) {
        
        if ($character == " ") { 
            $resultArray[] = " ";
            continue;
        }

        $searchInArray = array_search($character, $alphabetArray); 
        $newIndex = ($searchInArray + $shiftChoice) % count($alphabetArray);  
        $resultArray[] = $alphabetArray[$newIndex];  
       
    }
    return implode("", $resultArray); 
  
}

function cesarDecypher($userInput, $alphabetArray, $shiftChoice)
{
    $resultArray = [];
    $alphabetCount = count($alphabetArray);
    
    foreach (str_split($userInput) as $character) {
        if ($character == " ") { 
            $resultArray[] = " ";
            continue;
        }

        $searchInArray = array_search($character, $alphabetArray);
        $newIndex = (($searchInArray - $shiftChoice) % $alphabetCount + $alphabetCount) % $alphabetCount;
        $resultArray[] = $alphabetArray[$newIndex]; 
        
    }
    return implode("", $resultArray);
}