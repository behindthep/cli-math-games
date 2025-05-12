<?php

namespace BrainGames\Games;

use BrainGames\Engine;

class Gcd
{
    private const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

    private function getGcd(int $number1, int $number2): int
    {
        if ($number1 === 0) {
            return $number2;
        }

        return $this->getGcd($number2 % $number1, $number1);
    }

    private function generateData(): array
    {
        $data = [];

        for ($i = 1; $i <= Engine::ROUNDS_COUNT; $i++) {
            $number1 = rand(1, 20);
            $number2 = rand(1, 20);
            $answer = (string) $this->getGcd($number1, $number2);
            $question = "{$number1} {$number2}";

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
