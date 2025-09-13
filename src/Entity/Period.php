<?php

declare(strict_types=1);

namespace App\Entity;

use Matrix\Database\AbstractEntity;

/**
 * All properties are public due to fetch mode PDO::FETCH_CLASS
 */
class Period extends AbstractEntity
{
    public int $begin;

    public null|int $end;

    // Joined translation

    public string $tag;

    public string $name;

    public string $description;

    // Joined entities
    
    /** @var Compositors[] */
    public array $compositors = [];

    // Dynamic properties

    public null|int $countCompositors;

    public function getName(): string
    {
        return $this->name;
    }

    public function getBegin(): int
    {
        return $this->begin;
    }

    public function getEnd(): null|int
    {
        return $this->end;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function countCompositors(): int
    {
        return $this->countCompositors ?? 0;
    }

    /**
     * @return Compositor[]
     */
    public function getCompositors(): array
    {
        return $this->compositors;
    }

    public function setCompositors(array $compositors): self
    {
        $this->compositors = $compositors;

        return $this;
    }

    public function getDuration(): int
    {
        $now = (int)(new \DateTimeImmutable())->format('Y');
        return $this->end === null ? $now - $this->begin : $this->end - $this->begin;
    }
}
