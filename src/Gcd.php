<?php

declare(strict_types=1);

namespace Brain\Games\Gcd;

function checkParity(): void
{
    $minNumberInRange = 1;
    $maxNumberInRange = 25;
    $checkingNumber = rand($minNumberInRange, $maxNumberInRange);

    if ($checkingNumber % 2 === 0) {
        $evened = true;
    } else {
        $evened = false;
    }

    echo "Question: {$checkingNumber}\n";
    echo "Your answer: ";
    $answer = trim(fgets(STDIN));

    $countOfRightAswers = 0;
    while ($countOfRightAswers < 3) {
        if (($answer === 'yes' && $evened === true) || ($answer === 'no' && $evened === false)) {
            echo "Correct!\n";
            $countOfRightAswers++;
        } elseif (($answer === 'no' && $evened === true) || ($answer === 'yes' && $evened === false)) {
            echo "'{$answer}' is wrong answer. Correct answer was '{$checkingNumber}'.\n";
            echo "Let's try again, {USER_NAME}!\n";  
            $countOfRightAswers = 0;                                                                          
        } else {
            echo "You can answer only 'yes' or 'no'.\n";
        }
    }
    echo "Congratulations, {USER_NAME}!\n";
}
