<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;
use Brain\Games\Games\Interfaces\GameInterface;

class Even implements GameInterface
{
    private static function isEven(int $num): bool
    {
        return $num % 2 === 0;
    }

    public static function play(): void
    {
        $description = "Answer 'yes' if the number is even, otherwise answer 'no'.";

        $generateGameData = function (): array {
            $question = rand(1, 25);
            $answer   = self::isEven($question) ? 'yes' : 'no';

            return [$question, $answer];
        };

        Engine::runGame($description, $generateGameData);
    }
}
