<?php

declare(strict_types=1);

namespace Brain\Games\Games\Even;

function checkParity(string $userName, int $numberOfCorrectAnswers = 0): void
{
    if ($numberOfCorrectAnswers === 3) {
        echo "Congratulations, " . $userName . "!\n";
        return;
    }

    $minNumberInRange = 1;
    $maxNumberInRange = 25;
    $checkingNumber   = rand($minNumberInRange, $maxNumberInRange);

    $evened           = ($checkingNumber % 2 === 0);

    echo "Question: {$checkingNumber}\n";
    echo "Your answer: ";
    $answer = getUserAnswer();

    if (checkAnswer($answer, $evened)) {
        echo "Correct!\n";
        checkParity($userName, $numberOfCorrectAnswers + 1);
    } else {
        $correctAnswer = $evened ? 'yes' : 'no';
        echo "'{$answer}' is wrong answer. Correct answer was '{$correctAnswer}'.\n";
        echo "Let's try again, " . $userName . "!\n";
    }
}

function getUserAnswer(): string
{
    while (true) {
        $answer = trim(fgets(STDIN));
        if ($answer === 'yes' || $answer === 'no') {
            return $answer;
        }
        echo "You can answer only 'yes' or 'no'. Please try again: ";
    }
}

/**
* yes и чётно    - true
* yes и не чётно - false
* no  и чётно    - false
* no  и не чётно - true
*/
function checkAnswer(string $answer, bool $evened): bool
{
    return ($answer === 'yes' && $evened) || ($answer === 'no' && !$evened);
}
