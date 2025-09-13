<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Compositor;
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
            ' . $tableVersion . '.tag,
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
    public function findPeriodsExpanded(string $lang): array
    {
        $tableVersion = $lang . '_period';
        $data = [];

        $query = 'SELECT
            period.id,
            period.begin,
            period.end,
            ' . $tableVersion . '.tag,
            ' . $tableVersion . '.name,
            ' . $tableVersion . '.description,
            count(period_compositor.compositor_id) AS countCompositors
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
    public function findPeriodsByCompositor(Compositor $compositor, string $lang): array
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
        
        $data = $this->queryFetchAll($query, Period::class, ['id' => $compositor->getId()]);

        return $data;
    }

    public function findPeriodByTag(string $tag, string $lang): null|Period
    {
        $tableVersion = $lang.'_period';
        /** @todo Avoid dichotomous language distincton : Consider isoLanguageCodes */
        $langAlt = ($lang === 'fr')? 'en' : 'fr';

        $query = 'SELECT
            period.id,
            period.begin,
            period.end,
            ' . $tableVersion . '.tag,
            ' . $tableVersion . '.name,
            ' . $tableVersion . '.description,
            ' . $langAlt . '_period.tag AS langAlt
            FROM period
            INNER JOIN ' . $tableVersion . ' ON ' . $tableVersion . '.period_id = period.id
            INNER JOIN ' . $langAlt . '_period ON ' . $langAlt . '_period.period_id = period.id
            WHERE ' . $tableVersion . '.tag = :tag';
        
        $data = $this->queryFetch($query, Period::class, ['tag' => $tag]);

        return $data;
    }
}
