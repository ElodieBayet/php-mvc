<?php

declare(strict_types=1);

namespace App\Repository;

use Matrix\Database\EntityRepository;
use App\Entity\Compositor;

class CompositorRepository extends EntityRepository
{
     /** @var string Clause symbol for younger production than current */
    const YOUNG = '>'; // For left button :: WHERE compositor.birth > :currentDate

    /** @var string Clause symbol for older production than current */
    const OLD = '<'; // For right button :: WHERE compositor.birth < :currentDate

    /**
     * @return Compositor[]
     */
    public function findAllCompositors(): array
    {
        $data = [];

        $query = 'SELECT
            compositor.id,
            compositor.lastname,
            compositor.firstname,
            compositor.birth,
            compositor.death,
            compositor.tag,
            GROUP_CONCAT(period_compositor.period_id SEPARATOR ", ") AS periodIds
            FROM compositor
            INNER JOIN period_compositor ON period_compositor.compositor_id = compositor.id
            GROUP BY compositor.id
            ORDER BY compositor.birth';

        $data = $this->queryFetchAll($query, Compositor::class);

        return $data;
    }

    /**
     * @return Compositor[]
     */
    public function findCompositorsByPeriod(int $period): array
    {
        $data = [];

        $query = 'SELECT
            compositor.id,
            compositor.lastname,
            compositor.firstname
            FROM compositor
            INNER JOIN period_compositor ON period_compositor.compositor_id = compositor.id
            WHERE period_compositor.period_id = :period
            ORDER BY compositor.birth
            LIMIT 20';

        $data = $this->queryFetchAll($query, Compositor::class, ['period' => $period]);

        return $data;
    }

    /**
     * @return Compositor
     */
    public function findCompositorByTag(string $tag): null|Compositor
    {
        $data = null;

        $query = 'SELECT * FROM compositor WHERE compositor.tag = :tag';

        $data = $this->queryFetch($query, Compositor::class, ['tag' => $tag]);

        return $data;
    }

    /**
     * Select previous or next sibling compositor
     *
     * @param string $currentDate Reference date of birth
     * @param string $target Clause selector for older or younger
     */
    public function findSiblingByBirthDate(string $date, string $target): null|Compositor
    {
        $data = null;

        // If searching down add clause
        $orderMode = $target === self::OLD ? 'DESC' : 'ASC';

        $query = 'SELECT
            compositor.id,
            compositor.lastname,
            compositor.tag
            FROM compositor
            WHERE compositor.birth ' . $target . ' :date
            ORDER BY compositor.birth '. $orderMode .'
            LIMIT 1';

        $data = $this->queryFetch($query, Compositor::class, ['date' => $date]);

        return ($data)? $data : null;
    }
}
