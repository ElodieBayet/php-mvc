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

    public string $route;

    public string $name;

    public string $description;

    // Joined entities
    
    /** @var Compositors[] */
    public $compositors;

    // Dynamic properties

    /** @var int */
    public $totalCompositors;

    public function getDuration(): int
    {
        $now = (int)(new \DateTimeImmutable())->format('Y');
        return $this->end === null ? $now - $this->begin : $this->end - $this->begin;
    }
}
