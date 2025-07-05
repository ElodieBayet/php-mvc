<?php

declare(strict_types=1);

namespace App\Entity;

use Matrix\Database\AbstractEntity;

class Compositor extends AbstractEntity
{
    /** @var string */
    public $lastname;

    /** @var string */
    public $firstname;

    /** @var string */
    public $birth;

    /** @var string */
    public $death;

    /** @var string */
    public $origin;

    /** @var string */
    public $figure;

    /** @var string */
    public $route;

    // Subentities
    
    /** @var Compositor */
    public $previous;

    /** @var Compositor */
    public $next;

    // Dynamic properties

    /** @var string Set of periods from 'group_concat' */
    public $periods;
    
    public function getBirthFormated(string $lang = 'fr'): string
    {
        $format = $lang === 'fr' ? 'd.m.Y' : 'F \t\h\e jS, Y';
        return (new \DateTime($this->birth))->format($format);
    }

    public function getDeathFormated(string $lang = 'fr'): string
    {
        $format = $lang === 'fr' ? 'd.m.Y' : 'F \t\h\e jS, Y';
        return (new \DateTime($this->death))->format($format);
    }

    public function getLife(): int
    {
        $birth = new \DateTimeImmutable($this->birth);
        $death = new \DateTimeImmutable($this->death);
        return $birth->diff($death)->y;
    }
}
