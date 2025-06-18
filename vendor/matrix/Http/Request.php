<?php

declare(strict_types=1);

namespace Matrix\Http;

class Request
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';

    public const LANGUAGE = 'fr';

    /** @var string $method */
    private static $method;

    /** @var string $uri Raw URI */
    private static $uri;

    /** @var string $locale Root of URI that must contain language version */
    private static $locale;

    /** @var array $path Array of URI splited after language version */
    private static $path;

    /** @var string $query Array of query part splited as key => value(s) */
    private static $query;

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

    public function getQuery(): array
    {
        return self::$query ?? [];
    }

    private function initialize(array $languages): void
    {
        // Request contains at least one character for '/' after language redirection or selection
        if (strlen(self::$uri) <= 1) {
            return;
        }

        // Clear /index.{ext} if so
        $uri = preg_replace('/\/index\..{3,4}/', '', self::$uri);
        $parsed = parse_url($uri);

        if (isset($parsed['path'])) {
            self::$path = explode('/', trim($parsed['path'], '/'));

            if (in_array(self::$path[0], $languages)) {
                self::$locale = array_shift(self::$path);
            }

            self::$path[0] = self::$path[0] ?? ''; // forced to '' for root access
        
            if (self::$path[0] !== '' && false !== end(self::$path)) {
                self::$path[array_key_last(self::$path)] = preg_replace('/\.php/', '', end(self::$path));
            }
        }

        if (isset($parsed['query'])) {
            $qBag = explode('&', $parsed['query']);
            foreach ($qBag as $entry) {
                $eqPos = strpos($entry, '=')?: null;
                if (str_contains($entry, '[]')) {
                    $key = substr($entry, 0, strpos($entry, '['));
                    self::$query[$key][] = substr($entry, $eqPos+1);
                } else {
                    $key = substr($entry, 0, $eqPos);
                    self::$query[$key] = null !== $eqPos ? substr($entry, $eqPos+1) : '';
                }
            }
        }
    }
}
