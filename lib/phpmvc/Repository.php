<?php

namespace phpmvc;

/**
 * Representation of DataBase repository
 * @uses PDO
 */
class Repository {

    /** @var \PDO */
    private static $pdo = null;

    /** @var array */
    const OPTIONS = [
        // Enable PDOException : alert codes 
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        // Retrieve mode as an associated array : the key is the name of the column
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        // Use native interface for prepared sql-requests
        \PDO::ATTR_EMULATE_PREPARES => false
    ];

    /**
     * Build a single connection to database
     * @uses DATABASE constant
     */
    public function __construct() {
        if (self::$pdo === null) self::connection(DATABASE); 
        return self::$pdo;
    }

    /**
     * @param array $database
     * List of Database connection logins, sorted with following keys
     * * 'pilot'
     * * 'port'
     * * 'dbname'
     * * 'charset'
     * * 'user'
     * * 'password'
     */
    private static function connection(array $database) {
        
        extract($database);
        
        $dsn = $pilot.':host='.$host.';port='.$port.';dbname='.$dbname.';charset='.$charset;

        try {
            self::$pdo = new \PDO($dsn, $user, $password, self::OPTIONS);
        } catch (\PDOException $pdoError) {
            throw $pdoError;
        }
    }

    /**
     * Handle a query for a single dataset
     * @uses PDOStatement::setFetchMode at PDO::FETCH_CLASS
     * @uses PDOStatement::fetch
     * @param string $sql Request in SQL format
     * @param array $param List of association keys => values for prepared queries
     * @param string $classEntity Class name for Entity implementation
     * @return mixed Return an entity of dataset or null if failed
     */
    public function queryFetch(string $sql, array $param, string $classEntity): mixed {
        try {
            $query = self::$pdo->prepare($sql);
            $query->execute($param);
            $query->setFetchMode(\PDO::FETCH_CLASS, $classEntity);
            $set = $query->fetch();
            $query->closeCursor();
            return $set;
        } catch (\PDOException $queryError) {
            // log 'PDO::query', $queryError->message ?
            return null;
        }
    }

    /**
     * Handle a query for a collection of data
     * @uses PDOStatement::setFetchMode at PDO::FETCH_CLASS
     * @uses PDOStatement::fetchAll
     * @param string $sql Request in SQL format
     * @param array $param List of association keys => values for prepared queries
     * @param string $classEntity Class name for Entity implementation
     * @return array|null Return an array of entities of dataset, or null if failed
     */
    public function queryFetchAll(string $sql, string $classEntity): ?array {
        try {
            $query = self::$pdo->query($sql);
            $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $classEntity);
            $collection = $query->fetchAll();
            $query->closeCursor();
            return $collection;
        } catch (\PDOException $queryError) {
            // log 'PDO::query', $queryError->message ?
            return null;
        }
    }
}