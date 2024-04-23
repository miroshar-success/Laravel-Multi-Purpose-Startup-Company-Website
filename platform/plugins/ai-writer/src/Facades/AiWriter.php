<?php

namespace ArchiElite\AiWriter\Facades;

use ArchiElite\AiWriter\Contracts\AiWriter as AiWriterContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \ArchiElite\AiWriter\AiWriter withProxy()
 * @method static array getModels()
 * @method static string generateContent(string $prompt)
 * @method static bool isEnabled()
 *
 * @see \ArchiElite\AiWriter\AiWriter
 */
class AiWriter extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AiWriterContract::class;
    }
}
