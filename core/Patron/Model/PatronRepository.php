<?php

namespace core\Patron\Model;

use phpmvc\Repository;

/**
 * Provides queries for Patron
 */
class PatronRepository {

    /**
     * Retrieve one patron by tag
     * @param string $tag Value for field comparison
     * @return PatronEntity|null Entity of data found or null if no match
     */
    public static function retrieveOne(string $tag): ?PatronEntity {

        $sqlQuery = 'SELECT * FROM patron WHERE tag = :tag';
        
        $repository = new Repository;
        
        $data = $repository->queryFetch($sqlQuery, [':tag' => $tag], PatronEntity::class);
        
        return $data;
    }

    /**
     * Retrieve a collection of patrons
     * @return array|null Array of Entities found or null if no match
     */
    public static function retrieveAll(): ?array {

        $sqlQuery = 'SELECT tag, title FROM patron';
        
        $repository = new Repository;
        
        $data = $repository->queryFetchAll($sqlQuery, PatronEntity::class);
        
        return $data;
    }
}