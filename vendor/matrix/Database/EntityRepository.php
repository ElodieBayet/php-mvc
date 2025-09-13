<?php

declare(strict_types=1);

namespace Matrix\Database;

use Matrix\Database\AbstractDatabase;
use Matrix\Foundation\EnvironmentTrait;

class EntityRepository extends AbstractDatabase
{
    use EnvironmentTrait;

    /**
     * Handle a query to get one tuple
     *
     * @uses PDOStatement::setFetchMode at PDO::FETCH_CLASS
     * @uses PDOStatement::fetch
     *
     * @param string $sql Request in SQL
     * @param string $entity Class name
     * @param array $params List of key => value to bind
     *
     * @return mixed Instance or null
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
                echo '<pre>Database ::<br>' . $queryError . '</pre>';
                exit;
            }
        }

        return $tuple;
    }

    /**
     * Handle a query to get a collection of tuples
     *
     * @uses PDOStatement::setFetchMode at PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE
     * @uses PDOStatement::fetchAll
     *
     * @param string $sql Request in SQL
     * @param string $entity Class name
     * @param array $params List of key => value to bind
     *
     * @return array Collection of instance or empty
     */
    public function queryFetchAll(string $sql, string $entity, array $params = []): array
    {
        $collection = [];
        
        try {
            if (empty($params)) {
                $query = self::$pdo->query($sql);
            } else {
                $query = self::$pdo->prepare($sql);
                $query->execute($params);
            }
            $query->setFetchMode(\PDO::FETCH_CLASS, $entity);
            $collection = $query->fetchAll();
            $query->closeCursor();
        } catch (\PDOException $queryError) {
            if ($this->isDebugging()) {
                echo '<pre>Database ::<br>' . $queryError . '</pre>';
                exit;
            }
        }

        return $collection;
    }

    /**
     * Handle a no-entity query
     *
     * @uses PDOStatement::fetch
     *
     * @param string $sql Request in SQL
     * @param array $params List of key => value to bind
     *
     * @return mixed Associated array as column name => value
     */
    public function queryExecute(string $sql, array $params = []): mixed
    {
        $result = null;

        try {
            if (empty($params)) {
                $query = self::$pdo->query($sql);
            } else {
                $query = self::$pdo->prepare($sql);
                $query->execute($params);
            }
            $result = $query->fetch();
            $query->closeCursor();
        } catch (\PDOException $queryError) {
            if ($this->isDebugging()) {
                echo '<pre>Database ::<br>' . $queryError . '</pre>';
                exit;
            }
        }

        return $result;
    }
}
