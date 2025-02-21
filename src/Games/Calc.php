<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\runGame;

function calculate(int $firstNum, int $secondNum, string $sign): int
{
    switch ($sign) {
        case '+':
            return $firstNum + $secondNum;
        case '-':
            return $firstNum - $secondNum;
        case '*':
            return $firstNum * $secondNum;
        default:
            throw new \Exception('There is no such operator: {$sign}.');
    }
}

function play(): void
{
    $description = "What is the result of the expression?";

    $generateGameData = function (): array {
        $firstNum = rand(1, 10);
        $secondNum = rand(1, 10);

        $mapSign = ['+', '-', '*'];
        $sign = $mapSign[array_rand($mapSign)];

        $question = "{$firstNum} {$sign} {$secondNum}";
        $answer = (string)(calculate($firstNum, $secondNum, $sign));

        return [$question, $answer];
    };

    runGame($description, $generateGameData);
}
