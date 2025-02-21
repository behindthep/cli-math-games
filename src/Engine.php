<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_NUMBER = 3;

function runGame(string $description, callable $generateGameData): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?", marker: ' ');
    line("Hello, {$name}!");
    line($description);

    for ($i = 0; $i < ROUNDS_NUMBER; $i++) {
        [$question, $answer] = $generateGameData();

        line("Question: {$question}");
        $playerAnswer = strtolower(trim(prompt("Your answer")));

        if ($playerAnswer === $answer) {
            line("Correct!");
        } else {
            line("'{$playerAnswer}' is wrong answer. Correct answer was '{$answer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
}
