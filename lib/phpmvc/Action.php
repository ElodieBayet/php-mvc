<?php

namespace phpmvc;

use phpmvc\Request;

/**
 * Manage association of routes and controllers
 */
class Action {

    /** @var string */
    private $route = ''; 
    
    /** @var string */
    private $controller = ''; 
    
    /**
     * Implement current route and targeted controller
     * @param array $set Use those keys : 'route' and 'controller
     */
    public function __construct(array $set) {
        if (isset($set['route'])) {
            $this->setRoute($set['route']);
        }
        if (isset($set['controller'])) {
            $this->setController($set['controller']);
        }
    }

    // Getters --

    /**
     * @return string Current route
     */
    public function route(): string {
        return $this->route;
    }

    /**
     * @return string Controller target
     */
    public function controller() {
        return $this->controller;
    }
    
    // Setters --

    /**
     * @param string $route
     */
    public function setRoute(string $route) { 
        $this->route = $route;
    }

    /**
     * @param string $controller
     */
    public function setController(string $controller) {
        if (class_exists($controller)) {
            $this->controller = $controller;
        }
    }

    // Methods --

    /**
     * Test if current request equals route
     * @param Request $request
     * @return bool True if match
     */
    public function matchRoute(Request $request): bool {
        $list = $request->path();
        return end($list) === $this->route;
    }
}