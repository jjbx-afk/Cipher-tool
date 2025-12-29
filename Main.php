<?php
// include 'Atbash.php';
// include 'Affine.php';
// include 'Morse.php';

// const MORSE_WORDS_SEPARATOR = '   ';
// const MORSE_LETTERS_SEPARATOR = ' ';

include 'Cesar.php';

const ENCODING_CHOICE_ENCODE = 1;
const ENCODING_CHOICE_DECODE = 2;

const CESAR_ALGORITHM = 1;
const VIGNERE_ALGORITHM = 2;
const ATBASH_ALGORITHM = 3;
const RAIL_FENCE_ALGORITHM = 4;
const AFFINE_ALGORITHM = 5;
const MORSE_ALGORITHM = 6;

print_r("Do you want to: \n [" . ENCODING_CHOICE_ENCODE . "] Encrypt \n [" . ENCODING_CHOICE_DECODE . "] Decrypt \n");
$encodinUserChoice = readline("> ");
print_r("\n");

if ($encodinUserChoice != 1 && $encodinUserChoice != 2){
    echo "You can choose only option 1 or 2! Try again.";
    exit;
}

print_r("Choose the algorithm: \n 
[" . CESAR_ALGORITHM . "] Cesar \n 
[" . VIGNERE_ALGORITHM . "] Vigenere \n 
[" . ATBASH_ALGORITHM . "] Atbash \n 
[" . RAIL_FENCE_ALGORITHM . "] Rail Fence \n 
[" . AFFINE_ALGORITHM . "] Affine \n 
[" . MORSE_ALGORITHM . "] Morse code \n");
$algorithm = readline("> ");
print_r("\n");

if ($algorithm < 1 || $algorithm > 6) {
    echo "Enter a number between 1 and 6! try again..";
    exit;
}

print_r("Your message: \n");
$userInput = readline("> ");
print_r("\n");

if (!ctype_alpha($userInput)) {
    echo "Enter letters only (A–Z)! Try again..";
    exit;
}

switch ($algorithm) {
    case CESAR_ALGORITHM;
    print_r("Choose a shift: \n");
    $shiftChoice = readline("> ");
    break;
}

if (!ctype_digit($shiftChoice) || (int)$shiftChoice < 0) {
    echo "Enter a positif number only! Try again..";
    exit;
}

if ($encodinUserChoice == ENCODING_CHOICE_ENCODE && $algorithm == CESAR_ALGORITHM) {
    $result = cesarCypher($userInput, $alphabetArray, $shiftChoice);
}

if ($encodinUserChoice == ENCODING_CHOICE_DECODE && $algorithm == CESAR_ALGORITHM) {
    $result = cesarDecypher($userInput, $alphabetArray, $shiftChoice);
}

if ($encodinUserChoice == ENCODING_CHOICE_ENCODE && $algorithm == CESAR_ALGORITHM) { 
    $result = cesarCypher($userInput, $alphabetArray, $shiftChoice);
}

if ($encodinUserChoice == ENCODING_CHOICE_DECODE && $algorithm == MORSE_ALGORITHM) {
    $result = cesarDecypher($userInput, $alphabetArray, $shiftChoice);
}

print_r("\n");
echo "Your original text: " . $userInput . "\n";
echo "Your encrypted text: " . $result . "\n"; 


//     case ATBASH_ALGORITHM;
//         break;
//     case AFFINE_ALGORITHM;
//         $firstKey = print_r("Choose the first key! (The first key must be coprime with 26.) : \n");
//         if (in_array($firstKey, $coPrimeArray)) {
//             $firstKey = readline("> ");
//             print_r("\n");
//         } else {
//             print_r("Your key must be coprime with 26! Try again. \n");
//             exit;
//         }
//         print_r("Choose the second key! \n");
//         $secondKey = readline("> ");
//         break;
//     case MORSE_ALGORITHM;
//         break;
// }

// if ($encodinUserChoice == ENCODING_CHOICE_ENCODE && $algorithm == ATBASH_ALGORITHM) { make a function for atbash
//     $result = cesarCypher($userInput, $alphabetArray, $shiftChoice);
// }
// if ($encodinUserChoice == ENCODING_CHOICE_DECODE && $algorithm == ATBASH_ALGORITHM) {
//     $result = cesarDecypher($userInput, $alphabetArray, $shiftChoice);
// }
// if ($encodinUserChoice == ENCODING_CHOICE_ENCODE && $algorithm == AFFINE_ALGORITHM) {
//     $result = affineCypher($userInput, $alphabetArray, $multiplyFirstKey, $firstKey, $secondKey);
// }
// if ($encodinUserChoice == ENCODING_CHOICE_DECODE && $algorithm == AFFINE_ALGORITHM) {
//     $result = affineDecypher($userInput, $alphabetArray, $firstKey, $secondKey);
// }