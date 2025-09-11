<?php

declare(strict_types=1);

namespace Matrix\Model;

class Language
{
    /** International normalized code */
    private string $isoCode;

    /** Short name */
    private string $label;

    private string $title;

    private Route $route;

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
        return $this->label ?: '';
    }

    public function getTitle(): string
    {
        return $this->title ?: '';
    }

    public function getRoute(): Route
    {
        return $this->route;
    }
}
