<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;

class Gcd implements GameInterface
{
    private function findGcd(int $firstNum, int $secondNum): int
    {
        if ($secondNum === 0) {
            return abs($firstNum);
        }

        return $this->findGcd($secondNum, $firstNum % $secondNum);
    }

    public function play(): void
    {
        $description = "Find the greatest common divisor of given numbers.";

        $generateGameData = function (): array {
            $firstNum  = rand(1, 25);
            $secondNum = rand(1, 25);
            $question  = "{$firstNum} {$secondNum}";
            $answer    = (string) ($this->findGcd($firstNum, $secondNum));

            return [$question, $answer];
        };

        $game = new Engine();
        $game->runGame($description, $generateGameData);
    }
}
