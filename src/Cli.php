<?php

namespace Brain\Games;

use function cli\{line, prompt};

class Cli
{
    public static function run(): void
    {
        line("Welcome to the Brain Games!");
        // prompt signature: cli\prompt($question, $default = false, $marker = ':')
        $name = prompt("May I have your name?", marker: ' ');
        line("Hello, {$name}!");
    }
}
