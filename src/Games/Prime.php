<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;

class Prime implements GameInterface
{
    private function isPrime(int $num): bool
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

    public function play(): void
    {
        $description = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

        $generateGameData = function (): array {
            $question = rand(2, 20);
            $answer   = $this->isPrime($question) ? 'yes' : 'no';

            return [$question, $answer];
        };

        $game = new Engine();
        $game->runGame($description, $generateGameData);
    }
}
