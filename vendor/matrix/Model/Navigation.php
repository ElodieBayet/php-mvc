<?php

declare(strict_types=1);

namespace Matrix\Model;

class Navigation
{
    /** Unique identifier. Equals Page id */
    private string $code;

    private string $path;

    private string $label;

    public function __construct(string $code, string $path, string $label)
    {
        $this->code = $code;
        $this->path = $path;
        $this->label = $label;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function addPath(string $path): Navigation
    {
        $this->path = $this->path . '/' . $path;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }
}
