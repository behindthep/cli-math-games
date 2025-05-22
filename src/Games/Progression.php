<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function getProgression(int $firstNumber, int $step, int $length): array
{
    $progression = [];

    for ($i = $firstNumber; count($progression) <= $length; $i += $step) {
        $progression[] = $i;
    }

    return $progression;
}

function generateData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $firstNumber = rand(1, 50);
        $step = rand(1, 10);
        $progression = getProgression($firstNumber, $step, PROGRESSION_LENGTH);

        $hiddenItemIndex = array_rand($progression);
        $answer = (string) $progression[$hiddenItemIndex];
        $progression[$hiddenItemIndex] = '..';
        $question = implode(' ', $progression);

        $data[] = [$question, $answer];
    };

    return $data;
}

function run()
{
    $data = generateData();
    playGame($data, DESCRIPTION);
}
