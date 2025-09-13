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

    public string $tag;

    // Dynamic properties

    public null|string|array $periodIds = [];

    public function __construct()
    {
        if (is_null($this->periodIds)) {
            $this->periodIds = [];
        }

        if (is_string($this->periodIds)) {
            $this->periodIds = array_map(function($id) {
                return (int) $id;
            }, explode(', ', $this->periodIds));
        }
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getBirth(): string
    {
        return $this->birth;
    }

    public function getDeath(): string
    {
        return $this->death;
    }

    public function getOrigin(): null|string
    {
        return $this->origin;
    }

    public function getFigure(): null|string
    {
        return $this->figure;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getPeriodIds(): string|array
    {
        return $this->periodIds;
    }
    
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
