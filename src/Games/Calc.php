<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

function calculate(int $number1, int $number2, string $operator): int
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

function generateData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $number1 = rand(1, 20);
        $number2 = rand(1, 20);
        $operator = OPERATORS[array_rand(OPERATORS)];

        $question = "{$number1} {$operator} {$number2}";
        $answer = (string) calculate($number1, $number2, $operator);

        $data[] = [$question, $answer];
    };

    return $data;
}

function run(): void
{
    $data = generateData();
    playGame($data, DESCRIPTION);
}
