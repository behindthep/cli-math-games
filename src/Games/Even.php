<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\runGame;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function play(): void
{
    $description = "Answer 'yes' if the number is even, otherwise answer 'no'.";

    $generateGameData = function (): array {
        $question = rand(1, 25);
        $answer = isEven($question) ? 'yes' : 'no';

        return [$question, $answer];
    };

    runGame($description, $generateGameData);
}
