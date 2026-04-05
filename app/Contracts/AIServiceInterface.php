<?php

namespace App\Contracts;

interface AIServiceInterface
{
    public function ask(string $prompt): string;
}
