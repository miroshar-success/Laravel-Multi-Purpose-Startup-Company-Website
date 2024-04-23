<?php

namespace ArchiElite\AiWriter\Contracts;

interface AiWriter
{
    public function withProxy(): self;

    public function getModels(): array;

    public function generateContent(string $prompt): string;

    public function isEnabled(): bool;
}
