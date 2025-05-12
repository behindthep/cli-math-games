<?php

namespace BrainGames\Games;

use BrainGames\Engine;

class Even
{
    private const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

    private function isEven(int $num): bool
    {
        return $num % 2 === 0;
    }

    private function generateData(): array
    {
        $data = [];

        for ($i = 1; $i <= Engine::ROUNDS_COUNT; $i++) {
            $question = rand(1, 100);
            $answer = $this->isEven($question) ? 'yes' : 'no';

            $data[] = [$question, $answer];
        };

        return $data;
    }

    public static function run(): void
    {
        $instance = new self();
        $data = $instance->generateData();
        Engine::playGame($data, self::DESCRIPTION);
    }
}
