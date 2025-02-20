<?php

declare(strict_types=1);

namespace Brain\Games\User;

function showGreeting(): void
{
    echo "Welcome to the Brain Games!\n";
    echo "May I have your name? ";

    $userName = trim(fgets(STDIN));

    define("USER_NAME", $userName);
    echo "Hello, {USER_NAME}!\n";
}

