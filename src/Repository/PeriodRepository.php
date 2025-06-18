<?php

declare(strict_types=1);

namespace App\Repository;

use Matrix\Database\EntityRepository;
use App\Entity\Period;

class PeriodRepository extends EntityRepository
{
    /**
     * @return Period[]
     */
    public function findAllPeriods(string $lang): array
    {
        $tableVersion = $lang . '_period';
        $data = [];

        $query = 'SELECT
            period.id,
            period.begin,
            period.end,
            ' . $tableVersion . '.route,
            ' . $tableVersion . '.name
            FROM period
            INNER JOIN ' . $tableVersion . ' ON ' . $tableVersion . '.period_id = period.id
            ORDER BY period.begin';

        $data = $this->queryFetchAll($query, Period::class);

        return $data;
    }

    /**
     * @return Period[]
     */
    public function findAllPeriodsAndDetails(string $lang): array
    {
        $tableVersion = $lang . '_period';
        $data = [];

        $query = 'SELECT
            period.id,
            period.begin,
            period.end,
            ' . $tableVersion . '.route,
            ' . $tableVersion . '.name,
            ' . $tableVersion . '.description,
            count(period_compositor.compositor_id) AS totalCompositors
            FROM period
            INNER JOIN ' . $tableVersion . ' ON ' . $tableVersion . '.period_id = period.id
            LEFT JOIN period_compositor on period_compositor.period_id = period.id
            GROUP BY period.id
            ORDER BY period.begin';

        $data = $this->queryFetchAll($query, Period::class);

        return $data;
    }

    /**
     * @return Period[]
     */
    public function findAllPeriodsByCompositor(int $compositor, string $lang): array
    {
        $tableVersion = $lang.'_period';
        $data = [];

        $query = 'SELECT
            period.id,
            period.begin,
            period.end,
            ' . $tableVersion . '.name
            FROM period
            INNER JOIN ' . $tableVersion . ' ON ' . $tableVersion . '.period_id = period.id
            INNER JOIN period_compositor ON period_compositor.period_id = period.id
            WHERE period_compositor.compositor_id = :id';
        
        $data = $this->queryFetchAll($query, Period::class, ['id' => $compositor]);

        return $data;
    }

    /**
     * @return null|Period
     */
    public function findPeriodByRoute(string $route, string $lang): null|Period
    {
        $tableVersion = $lang.'_period';
        /** @todo Avoid dichotomous language distincton : Consider isoLanguageCodes */
        $langAlt = ($lang === 'fr')? 'en' : 'fr';

        $query = 'SELECT
            period.id,
            period.begin,
            period.end,
            ' . $tableVersion . '.route,
            ' . $tableVersion . '.name,
            ' . $tableVersion . '.description,
            ' . $langAlt . '_period.route AS langAlt
            FROM period
            INNER JOIN ' . $tableVersion . ' ON ' . $tableVersion . '.period_id = period.id
            INNER JOIN ' . $langAlt . '_period ON ' . $langAlt . '_period.period_id = period.id
            WHERE ' . $tableVersion . '.route = :route';
        
        $data = $this->queryFetch($query, Period::class, ['route' => $route]);

        if ($data instanceof Period) {
            return $data;
        }

        return null;
    }
}
