<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num <= 1) {
        return false;
    }
    if ($num === 2) {
        return true;
    }
    if ($num % 2 === 0) {
        return false;
    }

    for ($divisor = 3, $sqrt = (int) sqrt($num); $divisor <= $sqrt; $divisor += 2) {
        if ($num % $divisor === 0) {
            return false;
        }
    }

    return true;
}

function generateData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $question = rand(1, 100);
        $answer = isPrime($question) ? 'yes' : 'no';

        $data[] = [$question, $answer];
    };

    return $data;
}

function run()
{
    $data = generateData();
    playGame($data, DESCRIPTION);
}
