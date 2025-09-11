<?php

declare(strict_types=1);

namespace App\Entity;

use Matrix\Database\AbstractEntity;

/**
 * All properties are public due to fetch mode PDO::FETCH_CLASS
 */
class Compositor extends AbstractEntity
{
    public string $lastname;

    public string $firstname;

    public string $birth;

    public string $death;

    public string $origin;

    public null|string $figure;

    public string $route;

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
