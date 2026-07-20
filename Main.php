<?php

include 'Cesar.php';
include 'Vignere.php';
include 'Atbash.php';
include 'Affine.php';
include 'Morse.php';

$alphabetArray = range('a', 'z');
function getValidatedMessage(string $prompt): string
{
    print_r($prompt);
    $input = trim(readline("> "));
    print_r("\n");

    if ($input === '') {
        echo "Input cannot be empty. Try again.";
        exit;
    }

    if (!preg_match('/^[a-zA-Z ]+$/', $input)) {
        echo "Enter letters and spaces only! Try again..";
        exit;
    }

    return strtolower($input);
}

function getValidatedPositiveInt(string $prompt): int
{
    print_r($prompt);
    $input = trim(readline("> "));
    print_r("\n");

    if (!ctype_digit($input) || (int)$input < 0) {
        echo "Enter a positive integer only! Try again..";
        exit;
    }

    return (int)$input;
}

const ENCODING_CHOICE_ENCODE = 1;
const ENCODING_CHOICE_DECODE = 2;

const CESAR_ALGORITHM = 1;
const VIGNERE_ALGORITHM = 2;
const ATBASH_ALGORITHM = 3;
const RAIL_FENCE_ALGORITHM = 4;
const AFFINE_ALGORITHM = 5;
const MORSE_ALGORITHM = 6;

print_r("Do you want to: \n [" . ENCODING_CHOICE_ENCODE . "] Encrypt \n [" . ENCODING_CHOICE_DECODE . "] Decrypt \n");
$encodinUserChoice = (int)readline("> ");
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
$algorithm = (int)readline("> ");
print_r("\n");

if ($algorithm < 1 || $algorithm > 6) {
    echo "Enter a number between 1 and 6! try again..";
    exit;
}

// Get input message - Morse decode needs special handling
if ($algorithm == MORSE_ALGORITHM && $encodinUserChoice == ENCODING_CHOICE_DECODE) {
    print_r("Enter Morse code (use dots, dashes, and spaces):\n");
    $userInput = trim(readline("> "));
    print_r("\n");
    if (empty($userInput)) {
        echo "Input cannot be empty. Try again.";
        exit;
    }
} else {
    $userInput = getValidatedMessage("Your message:\n");
}

$result = null;

switch ($algorithm) {
    case CESAR_ALGORITHM:
        $shiftChoice = getValidatedPositiveInt("Choose a shift:\n");
        if ($encodinUserChoice == ENCODING_CHOICE_ENCODE) {
            $result = cesarCypher($userInput, $alphabetArray, $shiftChoice);
        } elseif ($encodinUserChoice == ENCODING_CHOICE_DECODE) {
            $result = cesarDecypher($userInput, $alphabetArray, $shiftChoice);
        }
        break;

    case VIGNERE_ALGORITHM:
        print_r("Enter keyword:\n");
        $keyword = trim(readline("> "));
        print_r("\n");

        if (empty($keyword)) {
            echo "Keyword cannot be empty! Try again.";
            exit;
        }

        if (!preg_match('/^[a-zA-Z]+$/', $keyword)) {
            echo "Keyword must contain letters only! Try again.";
            exit;
        }

        if ($encodinUserChoice == ENCODING_CHOICE_ENCODE) {
            $result = vigenereCypher($userInput, $alphabetArray, $keyword);
        } elseif ($encodinUserChoice == ENCODING_CHOICE_DECODE) {
            $result = vigenereDecypher($userInput, $alphabetArray, $keyword);
        }
        break;

    case ATBASH_ALGORITHM:
        if ($encodinUserChoice == ENCODING_CHOICE_ENCODE) {
            $result = atbashCypher($userInput, $alphabetArray);
        } elseif ($encodinUserChoice == ENCODING_CHOICE_DECODE) {
            $result = atbashDecypher($userInput, $alphabetArray);
        }
        break;

    case AFFINE_ALGORITHM:
        $firstKey = getValidatedPositiveInt("Enter first key (coprime with 26: 1,3,5,7,9,11,15,17,19,21,23,25):\n");
        $secondKey = getValidatedPositiveInt("Enter second key:\n");
        
        if ($encodinUserChoice == ENCODING_CHOICE_ENCODE) {
            $result = affineCypher($userInput, $alphabetArray, $firstKey, $secondKey);
        } elseif ($encodinUserChoice == ENCODING_CHOICE_DECODE) {
            $result = affineDecypher($userInput, $alphabetArray, $firstKey, $secondKey);
        }
        break;

    case MORSE_ALGORITHM:
        if ($encodinUserChoice == ENCODING_CHOICE_ENCODE) {
            $result = morseCypher($userInput);
        } elseif ($encodinUserChoice == ENCODING_CHOICE_DECODE) {
            $result = morseDecypher($userInput);
        }
        break;
}

if ($result === null) {
    echo "No cipher operation matched your selection.";
    exit;
}


print_r("\n");
echo "Your original text: " . $userInput . "\n";
echo "Your encrypted text: " . $result . "\n"; 