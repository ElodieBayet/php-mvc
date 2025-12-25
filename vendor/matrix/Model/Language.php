<?php

declare(strict_types=1);

namespace Matrix\Model;

class Language
{
    /** International normalized code */
    private string $isoCode;

    /** Short name. Ex. : 'FRA' */
    private string $label;

    /** Fullname. Ex. : Français */
    private string $title;

    private Navigation $navigation;

    public function __construct(string $isoCode, string $label, string $title, Navigation $navigation)
    {
        $this->isoCode = $isoCode;
        $this->label = $label;
        $this->title = $title;
        $this->navigation = $navigation;
    }

    public function getIsoCode(): string
    {
        return $this->isoCode ?: '';
    }

    public function getLabel(): string
    {
        return $this->label ?: '';
    }

    public function getTitle(): string
    {
        return $this->title ?: '';
    }

    public function getNavigation(): Navigation
    {
        return $this->navigation;
    }
}
