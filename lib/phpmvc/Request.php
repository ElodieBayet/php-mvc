<?php

namespace phpmvc;

/**
 * Manage Request
 */
class Request {

    /** @var array */
    private $path = [''];

    /** @var bool */
    private $isValid = false;

    /**
     * Treatment of request and implement $path variable
     * @param string $requestURI
     */
    public function __construct(string $requestURI) {
        $this->parseURI($requestURI);
    }

    // Getters --

    /**
     * Return the current path as an array with parts splitted
     * * Example : '/alpha/beta/gamma' will give [ 'alpha' , 'beta', 'gamma' ]
     * @return array
     */
    public function path(): array {
        return $this->path;
    }

    /**
     * Return True if URI parsing is correctly done
     * @return bool
     */
    public function isValid(): bool { 
        return $this->isValid;
    }

    // Methods --

    /**
     * Clear and split URI path
     * @param string $uri
     */
    private function parseURI(string $uri) {

        // Avoid 'index.ext'
        $clear = preg_replace('/\/index\..{3,4}/', '', $uri);
        // $clear = preg_replace('/\/php-mvc/', '', $url); // si dans demo.elo...
        // Extract path only
        $path = parse_url($clear, PHP_URL_PATH);

        if ($path) {
            // Split path parts 
            $this->path = explode('/', ltrim($path, '/')); 
            $this->isValid = true;
        } 

    }
}