<?php

declare(strict_types=1);

namespace Brain\Games\Utils\Input;

function getUserInput(): string {
    return trim(fgets(STDIN));
}
