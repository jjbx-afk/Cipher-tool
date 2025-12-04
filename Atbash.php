<?php

$alphabetArray = range('a', 'z');
$reverseAlphabet = range('z', 'a');

function atbashCypher($userInput, $alphabetArray, $reverseAlphabet)
{

    $result = "";
    foreach (str_split($userInput) as $character) { // découpe l'input en character
        if ($character == " ") { // transforme les espaces en espaces 
            $result = " ";

            continue;
        }
        $searchInArray = array_search($character, $reverseAlphabet); // chercher la valeurs de la lettre dans l'array 
        $result = $result . $alphabetArray[$searchInArray]; // redonne la lettre selon les valeurs correspandante dans l'array

    }
}
