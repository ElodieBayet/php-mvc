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
            compositor.route,
            GROUP_CONCAT(period_compositor.period_id) AS periods
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
    public function findCompositorByRoute(string $route): null|Compositor
    {
        $data = null;

        $query = 'SELECT * FROM compositor WHERE compositor.route = :route';

        $data = $this->queryFetch($query, Compositor::class, ['route' => $route]);

        return $data;
    }

    /**
     * Select previous or next sibling of current cmpositor
     *
     * @param string $currentDate Date of current Compositor
     * @param string $target Clause selector for older or younger
     *
     * @return null|Compositor
     */
    public function findSibling(string $currentDate, string $target): null|Compositor
    {
        $data = null;

        // If searching down add clause
        $orderMode = $target === self::OLD ? 'DESC' : 'ASC';

        $query = 'SELECT
            compositor.id,
            compositor.lastname,
            compositor.route
            FROM compositor
            WHERE compositor.birth ' . $target . ' :currentDate
            ORDER BY compositor.birth '. $orderMode .'
            LIMIT 1';

        $data = $this->queryFetch($query, Compositor::class, ['currentDate' => $currentDate]);

        return ($data)? $data : null;
    }
}
