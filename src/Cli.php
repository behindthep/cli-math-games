<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function run(): void
{
    line("Welcome to the Brain Game!");
    // prompt signature: cli\prompt($question, $default = false, $marker = ':')
    $name = prompt("May I have your name?", marker: ' ');
    line("Hello, {$name}!");
}
