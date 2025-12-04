<?php

include 'Cesar.php';
// include 'Atbash.php';
include 'Affine.php';
// include 'Morse.php';

const MORSE_WORDS_SEPARATOR = '   ';
const MORSE_LETTERS_SEPARATOR = ' ';
const ENCODING_CHOICE_ENCODE = 1;
const ENCODING_CHOICE_DECODE = 2;

const CESAR_ALGORITHM = 1;
const ATBASH_ALGORITHM = 2;
const AFFINE_ALGORITHM = 3;
const MORSE_ALGORITHM = 4;

print_r("Souhaitez-vous : \n [" . ENCODING_CHOICE_ENCODE . "] Chiffer \n [" . ENCODING_CHOICE_DECODE . "] Déchiffer \n");
$encodinUserChoice = readline("> ");
print_r("\n");

print_r("Choisir l'algorithme : \n [" . CESAR_ALGORITHM . "] Cesar \n [" . ATBASH_ALGORITHM . "] Atbash \n [" . AFFINE_ALGORITHM . "] Affine \n [" . MORSE_ALGORITHM . "] Morse \n");
$algorithme = readline("> ");
print_r("\n");

print_r("Votre message : \n");
$userInput = readline("> ");
print_r("\n");

switch ($algorithme) {
    case CESAR_ALGORITHM;
        print_r("choisissez un shift : \n");
        $shiftChoice = readline("> ");
        break;
    case ATBASH_ALGORITHM;
        break;
    case AFFINE_ALGORITHM;
        $firstKey = print_r("Choisissez la 1ère clé ! (la 1ère clé doit être un nombre premier avec 26. ) : \n");
        if (in_array($firstKey, $coPrimeArray)) {
            $firstKey =  readline("> ");
            print_r("\n");
        } else {
            print_r("Votre clé doit être un nombre premier avec 26! réssayez.. \n");
            exit;
        }
        print_r("Choisissez la 2e clé ! \n");
        $secondKey = readline("> ");
        break;
    case MORSE_ALGORITHM;
        break;
}

if ($encodinUserChoice == ENCODING_CHOICE_ENCODE && $algorithme == CESAR_ALGORITHM) {
    $result = cesarCypher($userInput, $alphabetArray, $shiftChoice);
}
if ($encodinUserChoice == ENCODING_CHOICE_DECODE  && $algorithme == CESAR_ALGORITHM) {
    $result = cesarDecypher($userInput, $alphabetArray, $shiftChoice);
}
// if ($encodinUserChoice == ENCODING_CHOICE_ENCODE && $algorithme == ATBASH_ALGORITHM) {  make a function for atbash
//     $result = cesarCypher($userInput, $alphabetArray, $shiftChoice);
// }
// if ($encodinUserChoice == ENCODING_CHOICE_DECODE  && $algorithme == ATBASH_ALGORITHM {
//     $result = cesarDecypher($userInput, $alphabetArray, $shiftChoice);
// }
if ($encodinUserChoice == ENCODING_CHOICE_ENCODE && $algorithme == AFFINE_ALGORITHM) {
    $result = affineCypher($userInput, $alphabetArray, $multiplyFirstKey, $firstKey, $secondKey);
}
if ($encodinUserChoice == ENCODING_CHOICE_DECODE && $algorithme == AFFINE_ALGORITHM) {
    $result = affineDecypher($userInput, $alphabetArray, $firstKey, $secondKey);
}
// if ($encodinUserChoice == ENCODING_CHOICE_ENCODE && $algorithme == CESAR_ALGORITHM) { 
//     $result = cesarCypher($userInput, $alphabetArray, $shiftChoice);
// }
// if ($encodinUserChoice == ENCODING_CHOICE_DECODE  && $algorithme == MORSE_ALGORITHM) { make a function for morse
//     $result = cesarDecypher($userInput, $alphabetArray, $shiftChoice);
// }
print_r("\n");
echo "Votre texte initial : " . $userInput . "\n";
echo "Votre texte chiffré : " . $result . "\n"; 
