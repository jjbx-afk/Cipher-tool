<?php

$alphabetArray = range('a', 'z');
$coPrimeArray = array('1', '3', '5', '7', '9', '11', '15', '17', '19', '21', '23', '25');
                                                                                                                                                        
function affineCypher($userInput,$alphabetArray,$multiplyFirstKey, $firstKey, $secondKey )
{

    foreach (str_split($userInput) as $character) { // découpe l'input en character
        if ($character === " ") { // transforme les espaces en espaces 
            $resultArray[] = " ";

            continue;
        }

        $searchInArray = array_search($character, $alphabetArray); // chercher la valeurs de la lettre dans l'array
        $multiplyFirstKey = ($searchInArray * $firstKey) % count($alphabetArray);
        $sumSecondKey  = ($multiplyFirstKey  + $secondKey) % count($alphabetArray);
        $resultArray[] = $alphabetArray[$sumSecondKey]; // redonne la lettre selon les valeurs correspandante dans l'array 
        return implode("", $resultArray); // implodes the characters together
    }


}


function affineDecypher($userInput,$alphabetArray, $firstKey, $secondKey)
{
    foreach (str_split($userInput) as $character) {
        if ($character === " ") {
            $resultArray[] = " ";

            continue;
        }
        $searchInArray = array_search($character, $alphabetArray);
        $decryptingFormula = ($firstKey ** -1) * ($searchInArray - $secondKey) % count($alphabetArray);
        $resultArray[] = $alphabetArray[$decryptingFormula];
        return implode("", $resultArray);
    }
  
}

