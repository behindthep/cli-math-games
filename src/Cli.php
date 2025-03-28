<?php

namespace Brain\Games;

use function cli\{line, prompt};

class Cli
{
    public function run(): void
    {
        line("Welcome to the Brain Game!");
        // prompt signature: cli\prompt($question, $default = false, $marker = ':')
        $name = prompt("May I have your name?", marker: ' ');
        line("Hello, {$name}!");
    }
}
