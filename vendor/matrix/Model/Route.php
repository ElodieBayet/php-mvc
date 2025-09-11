<?php

declare(strict_types=1);

namespace Matrix\Model;

class Route
{
    /** Unique identifier. Equals Page id */
    private string $code;

    private string $slug;

    private string $label;

    public function __construct(string $code, string $slug, string $label)
    {
        $this->code = $code;
        $this->slug = $slug;
        $this->label = $label;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function addSlug(string $slug): Route
    {
        $this->slug = $this->slug . '/' . $slug;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }
}
