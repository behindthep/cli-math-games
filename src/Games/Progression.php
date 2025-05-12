<?php

namespace BrainGames\Games;

use BrainGames\Engine;

class Progression
{
    private const DESCRIPTION = 'What number is missing in the progression?';
    private const PROGRESSION_LENGTH = 10;

    private function getProgression(int $firstNumber, int $step, int $length): array
    {
        $progression = [];

        for ($i = $firstNumber; count($progression) <= $length; $i += $step) {
            $progression[] = $i;
        }

        return $progression;
    }

    private function generateData(): array
    {
        $data = [];

        for ($i = 1; $i <= Engine::ROUNDS_COUNT; $i++) {
            $firstNumber = rand(1, 50);
            $step = rand(1, 10);
            $progression = $this->getProgression($firstNumber, $step, self::PROGRESSION_LENGTH);

            $hiddenItemIndex = array_rand($progression);
            $answer = (string) $progression[$hiddenItemIndex];
            $progression[$hiddenItemIndex] = '..';
            $question = implode(' ', $progression);

            $data[] = [$question, $answer];
        };

        return $data;
    }

    public static function run()
    {
        $instance = new self();
        $data = $instance->generateData();
        Engine::playGame($data, self::DESCRIPTION);
    }
}
