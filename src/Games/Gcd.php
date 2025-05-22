<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getGcd(int $number1, int $number2): int
{
    if ($number1 === 0) {
        return $number2;
    }

    return getGcd($number2 % $number1, $number1);
}

function generateData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $number1 = rand(1, 20);
        $number2 = rand(1, 20);
        $answer = (string) getGcd($number1, $number2);
        $question = "{$number1} {$number2}";

        $data[] = [$question, $answer];
    };

    return $data;
}

function run()
{
    $data = generateData();
    playGame($data, DESCRIPTION);
}
