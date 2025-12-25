<?php

declare(strict_types=1);

namespace Matrix\Foundation;

#[\Attribute]
class Route
{
    private array $methods;
   
    private array $path;

    private null|string $validation;

    private string $name;

    public function __construct(array $path, array $methods, string $name, null|string $validation = null)
    {
        $this->path = $path;
        $this->methods = $methods;
        $this->validation = $validation;
        $this->name = $name;
    }

    public function getPath(): array
    {
        return $this->path;
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isMethodMatch(string $httpVerb): bool
    {
        return in_array($httpVerb, $this->methods, true);
    }

    public function isUrlMatch(string $slug, string $locale): bool
    {
        if (!array_key_exists($locale, $this->path)) {
            return false;
        }

        if (null === $this->validation) {
            return $this->path[$locale] === $slug;
        }

        $pathRegEx = $this->pathRegExpBuilder($this->validation, $locale);
        return 1 === preg_match($pathRegEx, $slug);
    }

    /**
     * Build Regular Expression for route validation
     */
    private function pathRegExpBuilder(string $validation, string $locale): string
    {
        $pathRegEx = '#^';
        $pathParts = explode('/', trim($this->path[$locale], '/'));

        foreach ($pathParts as $part) {
            $pathRegEx .= '\/';
            $pathRegEx .= preg_match('#\{\w+\}#', $part) ? $validation : '\b' . $part . '\b' ;
        }

        $pathRegEx .= '$#';

        return $pathRegEx;
    }
}