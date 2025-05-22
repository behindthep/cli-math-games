<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function generateData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $question = rand(1, 100);
        $answer = isEven($question) ? 'yes' : 'no';

        $data[] = [$question, $answer];
    };

    return $data;
}

function run(): void
{
    $data = generateData();
    playGame($data, DESCRIPTION);
}
