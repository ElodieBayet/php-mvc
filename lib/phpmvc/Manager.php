<?php

namespace phpmvc;

/**
 * Common structure for Sections Manager
 */
abstract class Manager {

    /** 
     * Return list of routes in a section of the app
     * @return array
     */
    abstract protected function router(): array;
}