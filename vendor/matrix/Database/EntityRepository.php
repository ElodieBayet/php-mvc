<?php

declare(strict_types=1);

namespace Matrix\Database;

use Matrix\Database\AbstractDatabase;
use Matrix\Foundation\EnvironmentTrait;

class EntityRepository extends AbstractDatabase
{
    use EnvironmentTrait;

    /**
     * Handle a query for a single dataset
     *
     * @uses PDOStatement::setFetchMode at PDO::FETCH_CLASS
     * @uses PDOStatement::fetch
     *
     * @param string $sql Request in SQL format
     * @param string $entity Entity class name
     * @param array $params List of keys / values for prepared queries
     *
     * @return mixed The fulfilled entity or null
     */
    public function queryFetch(string $sql, string $entity, array $params): mixed
    {
        $tuple = null;

        try {
            $query = self::$pdo->prepare($sql);
            $query->execute($params);
            if (false === $query->setFetchMode(\PDO::FETCH_CLASS, $entity)) {
                throw new \PDOException("Implementation of entity '$entity' default : " . $query);
            }
            $tuple = $query->fetch();
            $query->closeCursor();
        } catch (\PDOException $queryError) {
            if ($this->isDebugging()) {
                echo '<pre>' . $queryError . '</pre>';
                exit;
            }
        }

        return $tuple;
    }

    /**
     * Handle a query for a collection of data
     *
     * @uses PDOStatement::setFetchMode at PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE
     * @uses PDOStatement::fetchAll
     *
     * @param string $sql Request in SQL format
     * @param string $entity Entity class name
     * @param array $params List of keys / values for prepared queries
     *
     * @return array Collection of entities or empty
     */
    public function queryFetchAll(string $sql, string $entity, array $params = []): array
    {
        $collection = [];
        
        try {
            if ($params) {
                $query = self::$pdo->prepare($sql);
                $query->execute($params);
            } else {
                $query = self::$pdo->query($sql);
            }
            $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $entity);
            $collection = $query->fetchAll();
            $query->closeCursor();
        } catch (\PDOException $queryError) {
            if ($this->isDebugging()) {
                echo '<pre>' . $queryError . '</pre>';
                exit;
            }
        }

        return $collection;
    }

    /**
     * Handle a query for aggregate
     *
     * @uses PDOStatement::fetch
     *
     * @param string $sql Request in SQL format
     * @param array $param List of keys / values for prepared queries
     *
     * @return mixed The result of aggregation
     */
    public function queryAggregate(string $sql, array $params = []): mixed
    {
        $result = null;

        try {
            if ($params) {
                $query = self::$pdo->prepare($sql);
                $query->execute($params);
            } else {
                $query = self::$pdo->query($sql);
            }
            $result = $query->fetch();
            $query->closeCursor();
        } catch (\PDOException $queryError) {
            if ($this->isDebugging()) {
                echo '<pre>' . $queryError . '</pre>';
                exit;
            }
        }

        return $result;
    }
}
