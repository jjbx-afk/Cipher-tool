<?php

$alphabetArray = range('a', 'z');
$morseCode = array('.-', '-...', '-.-.', '-..', '.', '..-.', '--.', '....', '..', '.---', '-.-', '.-..', '--', '-.', '---', '.--.', '--.-', '.-.', '...', '-', '..-', '...-', '.--', '-..-', '-.--', '--..');



// chiffrage 

if ($encodinUserChoice == ENCODING_CHOICE_ENCODE) {
    $result = "";
    foreach (str_split($userInput) as $character) {
        if ($character == MORSE_LETTERS_SEPARATOR) { // transforme les espaces en espaces  
            $result .= MORSE_WORDS_SEPARATOR;

            continue;
        }

        $searchInArray = array_search($character, $alphabetArray);
        $result .= $morseCode[$searchInArray] . MORSE_LETTERS_SEPARATOR;
    }
 
}





elseif ($encodinUserChoice == ENCODING_CHOICE_DECODE) {
    $result = "";
    $words = explode(MORSE_WORDS_SEPARATOR, $userInput); // explode text into arrays of words
    foreach ($words as $key => $word) {
        var_dump($word);


        foreach (explode(MORSE_LETTERS_SEPARATOR, $word) as $character) { // explode word into arrays of letters 

            $searchInArray = array_search($character, $morseCode); // find a way to know when it's a new letter 
            $result .= $alphabetArray[$searchInArray];
        }

        if ($key !== array_key_last($words)) {  // ajoute espace si pas dernier mot ; !== (if not)
            $result .= MORSE_LETTERS_SEPARATOR;
        }
    }




    
}

