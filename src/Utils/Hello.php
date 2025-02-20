<?php

declare(strict_types=1);

namespace Brain\Games\Utils\Hello;
use Brain\Games\Utils\Input;

function showGreeting(): void
{
    echo "Welcome to the Brain Games!\n";
}

function getUserName(): string
{
    echo "May I have your name? ";
    $userName = Input\getUserInput();
    echo "Hello, " . $userName . "!\n";
    
    return $userName;
}
