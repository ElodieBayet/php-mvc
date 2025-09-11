<?php

declare(strict_types=1);

namespace Matrix\Http;

class Request
{
    public const METHOD_GET = 'GET';

    public const LANGUAGE = 'fr';

    private static string $method;

    private static string $uri;

    /** Language provided by root of URL */
    private static string $locale;

    /** Array splited after language version */
    private static array $path;

    /**
     * Build a Request
     * 
     * @param null|string $uri Give URI to custom (default : REQUEST_URI)
     * @param null|string $method Give METHOD to custom (default : REQUEST_METHOD)
     * @param array $languages List of ISO code languages to handle locale
     */
    public function __construct(null|string $uri = null, null|string $method = null, array $languages = [])
    {
        self::$uri = $uri ?? $_SERVER['REQUEST_URI'];
        self::$method = $method ?? $_SERVER['REQUEST_METHOD'];

        $this->initialize($languages);
    }

    public function getMethod(): string
    {
        return self::$method;
    }

    public function getUri(): string
    {
        return self::$uri;
    }

    public function getLocale(): string
    {
        return self::$locale ?? self::LANGUAGE;
    }

    public function getPath(): array
    {
        return self::$path ?? [];
    }

    private function initialize(array $languages): void
    {
        // Request contains at least one character for '/' after language redirection or selection
        if (strlen(self::$uri) <= 1) {
            return;
        }

        // Clear /index.{ext} if so
        $uri = preg_replace('/\/index\..{,4}/', '', self::$uri);
        $parsed = parse_url($uri);

        if (isset($parsed['path'])) {
            self::$path = explode('/', trim($parsed['path'], '/'));

            if (in_array(self::$path[0], $languages)) {
                self::$locale = array_shift(self::$path);
            }

            // forced to '' for root access
            self::$path[0] = self::$path[0] ?? '';
        
            if (self::$path[0] !== '' && false !== end(self::$path)) {
                self::$path[array_key_last(self::$path)] = preg_replace('/\.php/', '', end(self::$path));
            }
        }
    }
}
