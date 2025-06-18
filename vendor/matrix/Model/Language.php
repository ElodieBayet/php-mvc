<?php

declare(strict_types=1);

namespace Matrix\Model;

class Language
{
    /** @var string $isoCode International normalized code of current language */
    private $isoCode;

    /** @var string $label Display name of current language */
    private $label;

    /** @var string $title Fullname of current language */
    private $title;

    /** @var Route $route */
    private $route;

    public function __construct(string $isoCode, string $label, string $title, Route $route)
    {
        $this->isoCode = $isoCode;
        $this->label = $label;
        $this->title = $title;
        $this->route = $route;
    }

    public function getIsoCode(): string
    {
        return $this->isoCode?: '';
    }

    public function getLabel(): string
    {
        return $this->label?: '';
    }

    public function getTitle(): string
    {
        return $this->title?: '';
    }

    public function getRoute(): Route
    {
        return $this->route;
    }
}
