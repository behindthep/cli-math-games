<?php

namespace BrainGames\Engine;

use function cli\{
    line,
    prompt
};

const ROUNDS_COUNT = 3;

function playGame(array $data, string $description): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($description);

    foreach ($data as [$question, $answer]) {
        line("Question: {$question}");
        $userAnswer = strtolower(trim(prompt("Your answer")));

        if ($userAnswer !== $answer) {
            line("'{$userAnswer}' is wrong answer. Correct answer was '{$answer}'.");
            line("Let's try again, {$name}!");
            return;
        }

        line("Correct!");
    }

    line("Congratulations, {$name}!");
}
