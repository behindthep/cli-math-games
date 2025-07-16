<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    $result = true;

    if ($num <= 1) {
        $result = false;
    } elseif ($num === 2) {
        $result = true;
    } elseif ($num % 2 === 0) {
        $result = false;
    } else {
        $sqrt = (int) sqrt($num);
        for ($divisor = 3; $divisor <= $sqrt; $divisor += 2) {
            if ($num % $divisor === 0) {
                $result = false;
                break;
            }
        }
    }

    return $result;
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

function run(): void
{
    playGame(generateData(), DESCRIPTION);
}
