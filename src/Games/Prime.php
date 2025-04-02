<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;
use Brain\Games\Games\Interfaces\GameInterface;

class Prime implements GameInterface
{
    private static function isPrime(int $num): bool
    {
        if ($num <= 1) {
            return false;
        }

        for ($i = 2; $i < (int) sqrt($num) + 1; $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }

        return true;
    }

    public static function play(): void
    {
        $description = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

        $generateGameData = function (): array {
            $question = rand(2, 20);
            $answer   = self::isPrime($question) ? 'yes' : 'no';

            return [$question, $answer];
        };

        $game = new Engine();
        $game->runGame($description, $generateGameData);
    }
}
