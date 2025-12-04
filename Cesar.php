<?php

$alphabetArray = range('a', 'z');

function cesarCypher($userInput, $alphabetArray, $shiftChoice)
{

    $resultArray = [];
    foreach (str_split($userInput) as $character) { // découpe l'input  en character
        if ($character == " ") { // transforme les espaces en espaces 
            $resultArray[] = " ";
            continue;
        }

        $searchInArray = array_search($character, $alphabetArray); // chercher la valeurs de la lettre dans l'array
        $newIndex = ($searchInArray + $shiftChoice) % count($alphabetArray);  // Calcule le reste pour repartir a 0

        $resultArray[] = $alphabetArray[$newIndex]; // redonne la lettre selon les valeurs correspandante dans l'array 
       
    }
    return implode("", $resultArray); //implodes the characters together
  
}


function cesarDecypher($userInput, $alphabetArray, $shiftChoice)
{
    $resultArray = [];
    foreach (str_split($userInput) as $character) {
        if ($character == " ") { // transforme les espaces en espaces 
            $resultArray[] = " ";

            continue;
        }

        $searchInArray = array_search($character, $alphabetArray);
        $newIndex = ($searchInArray - $shiftChoice) % count($alphabetArray);
        $resultArray[] = $alphabetArray[$newIndex]; 
        
    }
    return implode("", $resultArray);
}
