<?php

declare(strict_types=1);

namespace Matrix\Model;

use Matrix\Model\Language;
use Matrix\Model\Route;

class Page
{
    public const HTTP_ERROR_ID = 'http-error';

    /** @var string $lang Identificate the version of current page by ISO language code */
    private static $lang;

    /** @var null|string $id Identificate the current page */
    private static $id;

    /** @var string $title SEO readable title */
    private static $title;

    /** @var string $description SEO description of content */
    private static $description;

    /** @var null|string $ads Image URI for sharing (optional) */
    private static $ads;

    /** @var Route[] $mains Contains routes for main navigation */
    private static $mains = [];

    /** @var Route[] $seconds Contains routes for secondary navigation */
    private static $seconds = [];

    /** @var null|string The name of current section */
    private static $section;

    /** @var Language[] $versions Contains other versions of current page */
    private static $versions = [];

    /** @var string $h1 Contains value for <h1> of current page (optional) */
    private static $h1;

    public function __construct(string $lang)
    {
        self::$lang = $lang;
    }

    public function getLang(): string
    {
        return self::$lang;
    }

    public function setLang(string $lang): Page
    {
        self::$lang = $lang;

        return $this;
    }

    public function getId(): null|string
    {
        return self::$id;
    }

    public function setId(string $id): Page
    {
        self::$id = $id;

        return $this;
    }

    public function getTitle(): string
    {
        return self::$title ?? '';
    }

    public function setTitle(string $title): Page
    {
        self::$title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return self::$description ?? '';
    }

    public function setDescription(string $description): Page
    {
        self::$description = $description;

        return $this;
    }

    public function getAds(): null|string
    {
        return self::$ads;
    }

    public function setAds(string $ads): Page
    {
        self::$ads = $ads;

        return $this;
    }

    /**
     * @return Route[]
     */
    public function getMains(): array
    {
        return self::$mains;
    }

    public function addMains(Route $route): Page
    {
        if (!in_array($route, self::$mains)) {
            self::$mains[] = $route;
        }

        return $this;
    }

    /**
     * @return Route[]
     */
    public function getSeconds(): array
    {
        return self::$seconds;
    }

    public function addSeconds(Route $route): Page
    {
        if (!in_array($route, self::$seconds)) {
            self::$seconds[] = $route;
        }

        return $this;
    }

    public function getSection(): null|string
    {
        return self::$section;
    }

    public function setSection(string $section): Page
    {
        self::$section = $section;

        return $this;
    }

    /**
     * @return Language[]
     */
    public function getVersions(): array
    {
        return self::$versions;
    }

    public function setVersions(array $versions): Page
    {
        self::$versions = $versions;

        return $this;
    }

    public function addVersions(Language $language): Page
    {
        if (!in_array($language, self::$versions)) {
            self::$versions[] = $language;
        }

        return $this;
    }

    public function getH1(): string
    {
        return self::$h1 ?? self::$title;
    }

    public function setH1(string $h1): Page
    {
        self::$h1 = $h1;

        return $this;
    }

    /**
     * Overload title with begining text (handle white space and ':' separator)
     */
    public function overloadTitle(string $title)
    {
        self::$title = $title . ' : ' . self::$title; 
    }

    /**
     * Overload description with ending text (handle white space)
     */
    public function overloadDescription(string $description)
    {
        self::$description .= ' ' . $description;
    }

    /**
     * Overload alternative version by lang of current route and replace label
     *
     * @param array Key => Values as Lang => Slug
     */
    public function overloadVersionsByLang(array $versions): void
    {
        $keys = array_keys($versions);

        foreach (self::$versions as $version) {
            if (true === in_array($version->getIsoCode(), $keys)) {
                $version->getRoute()->addSlug($versions[$version->getIsoCode()]);
            }
        }
    }
}
