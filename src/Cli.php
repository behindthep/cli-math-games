<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
* cli\prompt signature:
* cli\prompt($question, $default = false, $marker = ':')
* https://github.com/wp-cli/php-cli-tools?tab=readme-ov-file#function-list
*/
function run(): void
{
    line("Welcome to the Brain Game!");
    $name = prompt("May I have your name?", marker: ' ');
    line("Hello, {$name}!");
}
