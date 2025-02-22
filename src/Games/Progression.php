<?php

namespace Brain\Games\Games\Prograssion;

use function Brain\Games\Engine\runGame;

function generateProgression(int $startElement, int $step, int $progressionLength): array
{
    $progression = [];

    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $startElement + $step * $i;
    }

    return $progression;
}

function play(): void
{
    $description = "What number is missing in the progression?";

    $generateGameData = function (): array {
        $startElement       = rand(1, 40);
        $step               = rand(2, 6);
        $progressionLength  = 8;
        $progression        = generateProgression($startElement, $step, $progressionLength);

        $hiddenElementIndex = rand(0, 8 - 1);
        $answer             = "{$progression[$hiddenElementIndex]}";
        $progression[$hiddenElementIndex] = '..';
        $question           = implode(' ', $progression);

        return [$question, $answer];
    };

    runGame($description, $generateGameData);
}
