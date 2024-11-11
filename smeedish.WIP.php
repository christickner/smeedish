<?php

require 'vendor/autoload.php';

use Symfony\Component\String\UnicodeString;

class SmeedishEncryption
{
    public function encrypt(string $input): string
    {
        $words = preg_split('/\s+/', trim($input));

        if (count($words) === 1) {
            return $this->encryptSingleWord($words[0]);
        } else {
            return $this->encryptMultiWord($words);
        }
    }

    private function encryptSingleWord(string $word): string
    {
        return $this->addRandomCharacters($word);
    }

    private function encryptMultiWord(array $words): string
    {
        $filteredWords = array_map(function ($word) {
            return preg_replace('/[^a-z]/', '', $word);
        }, $words);

        $filteredText = implode(' ', $filteredWords);
        return $this->addRandomCharacters($filteredText);
    }

    private function addRandomCharacters(string $text): string
    {
        $characters = str_split($text);
        $encryptedCharacters = [];

        foreach ($characters as $char) {
            $encryptedCharacters[] = $char;
            if (ctype_alpha($char)) {
                $randomChar = $this->getRandomCharacter();
                $encryptedCharacters[] = $randomChar;
            }
        }

        return implode('', $encryptedCharacters);
    }

    private function getRandomCharacter(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#@$%&*';
        return $characters[random_int(0, strlen($characters) - 1)];
    }
}

$input = "hello world! This is smeedish encryption.";
$smeedishEncryption = new SmeedishEncryption();
$encryptedText = $smeedishEncryption->encrypt($input);

echo "Original Text: " . $input . PHP_EOL;
echo "Encrypted Text: " . $encryptedText . PHP_EOL;
