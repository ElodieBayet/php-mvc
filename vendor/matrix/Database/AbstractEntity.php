<?php

declare(strict_types=1);

namespace Matrix\Database;

abstract class AbstractEntity
{
    public int $id;

    public function getId(): int
    {
        return $this->id;
    }
}
