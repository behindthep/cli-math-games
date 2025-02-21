<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\runGame;

function isPrime(int $num): bool
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i < (int) sqrt($num) + 1; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function play(): void
{
    $description = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

    $generateGameData = function (): array {
        $question = rand(2, 20);
        $answer = isPrime($question) ? 'yes' : 'no';

        return [$question, $answer];
    };

    runGame($description, $generateGameData);
}
