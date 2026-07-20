<?php

const MORSE_WORDS_SEPARATOR = '   ';
const MORSE_LETTERS_SEPARATOR = ' ';

function morseCypher(string $userInput): string
{
    $morseCode = [
        'a' => '.-', 'b' => '-...', 'c' => '-.-.', 'd' => '-..', 'e' => '.', 'f' => '..-.',
        'g' => '--.', 'h' => '....', 'i' => '..', 'j' => '.---', 'k' => '-.-', 'l' => '.-..',
        'm' => '--', 'n' => '-.', 'o' => '---', 'p' => '.--.', 'q' => '--.-', 'r' => '.-.',
        's' => '...', 't' => '-', 'u' => '..-', 'v' => '...-', 'w' => '.--', 'x' => '-..-',
        'y' => '-.--', 'z' => '--..'
    ];

    $result = '';
    $i = 0;
    foreach (str_split($userInput) as $character) {
        if ($character === ' ') {
            if ($i > 0) {
                $result .= MORSE_WORDS_SEPARATOR;
            }
            $i = 0;
            continue;
        }

        if (isset($morseCode[$character])) {
            if ($i > 0) {
                $result .= MORSE_LETTERS_SEPARATOR;
            }
            $result .= $morseCode[$character];
            $i++;
        }
    }

    return $result;
}

function morseDecypher(string $userInput): string
{
    $morseToAlpha = [
        '.-' => 'a', '-...' => 'b', '-.-.' => 'c', '-..' => 'd', '.' => 'e', '..-.' => 'f',
        '--.' => 'g', '....' => 'h', '..' => 'i', '.---' => 'j', '-.-' => 'k', '.-..' => 'l',
        '--' => 'm', '-.' => 'n', '---' => 'o', '.--.' => 'p', '--.-' => 'q', '.-.' => 'r',
        '...' => 's', '-' => 't', '..-' => 'u', '...-' => 'v', '.--' => 'w', '-..-' => 'x',
        '-.--' => 'y', '--..' => 'z'
    ];

    $result = '';
    $words = explode(MORSE_WORDS_SEPARATOR, $userInput);
    foreach ($words as $word) {
        if (!empty($result)) {
            $result .= ' ';
        }
        $letters = explode(MORSE_LETTERS_SEPARATOR, trim($word));
        foreach ($letters as $letter) {
            if (isset($morseToAlpha[$letter])) {
                $result .= $morseToAlpha[$letter];
            }
        }
    }

    return $result;
}

