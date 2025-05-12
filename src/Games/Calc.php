<?php

namespace BrainGames\Games;

use BrainGames\Engine;

class Calc
{
    private const DESCRIPTION = 'What is the result of the expression?';
    private const OPERATORS = ['+', '-', '*'];

    private function calculate(int $number1, int $number2, string $operator): int
    {
        switch ($operator) {
            case '+':
                return $number1 + $number2;
            case '-':
                return $number1 - $number2;
            case '*':
                return $number1 * $number2;
            default:
                throw new \Exception('unknown operator');
        }
    }

    private function generateData(): array
    {
        $data = [];

        for ($i = 1; $i <= Engine::ROUNDS_COUNT; $i++) {
            $number1 = rand(1, 20);
            $number2 = rand(1, 20);
            $operator = self::OPERATORS[array_rand(self::OPERATORS)];

            $question = "{$number1} {$operator} {$number2}";
            $answer = (string) $this->calculate($number1, $number2, $operator);

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
