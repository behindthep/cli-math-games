<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;

class Even implements GameInterface
{
    private function isEven(int $num): bool
    {
        return $num % 2 === 0;
    }

    public function play(): void
    {
        $description = "Answer 'yes' if the number is even, otherwise answer 'no'.";

        $generateGameData = function (): array {
            $question = rand(1, 25);
            $answer   = $this->isEven($question) ? 'yes' : 'no';

            return [$question, $answer];
        };

        $game = new Engine();
        $game->runGame($description, $generateGameData);
    }
}
