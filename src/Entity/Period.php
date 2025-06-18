<?php

declare(strict_types=1);

namespace App\Entity;

use Matrix\Database\AbstractEntity;

class Period extends AbstractEntity
{
    /** @var int */
    public $begin;

    /** @var int|null */
    public $end;

    // Joined translation

    /** @var string */
    public $route;

    /** @var string */
    public $name;

    /** @var string */
    public $description;

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
