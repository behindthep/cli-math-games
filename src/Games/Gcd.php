<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\runGame;

function findGcd(int $firstNum, int $secondNum): int
{
    if ($secondNum === 0) {
        return abs($firstNum);
    }

    return findGcd($secondNum, $firstNum % $secondNum);
}

function play(): void
{
    $description = "Find the greatest common divisor of given numbers.";

    $generateGameData = function (): array {
        $firstNum  = rand(1, 25);
        $secondNum = rand(1, 25);
        $question  = "{$firstNum} {$secondNum}";
        $answer    = (string) (findGcd($firstNum, $secondNum));

        return [$question, $answer];
    };

    runGame($description, $generateGameData);
}
