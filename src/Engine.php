<?php

namespace Brain\Games;

use function cli\{line, prompt};

class Engine
{
    public static function runGame(string $description, callable $generateGameData): void
    {
        line("Welcome to the Brain Games!");
        // prompt signature: cli\prompt($question, $default = false, $marker = ':')
        $name = prompt("May I have your name?", marker: ' ');
        line("Hello, {$name}!");
        line($description);

        for ($i = 0, $roundsNumber = 3; $i < $roundsNumber; $i++) {
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
}
