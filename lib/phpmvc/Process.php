<?php

namespace phpmvc;

use phpmvc\{ Request, Response, Controller };

/**
 * Representation of a Server Processus
 */
class Process {

    /** @var string Reference to error section */
    const ERROR_SECTION = 'core\Error\Error';

    /** @var Request */
    private $request = null;

    /** @var Response */
    private $response = null;

    /** @var Action */
    private $action = null;

    // Getters --

    /** @return Request */
    public function request(): ?Request {
        return $this->request;
    }
    
    /** @return Response */
    public function response(): ?Response {
        return $this->response;
    }

    /** @return Action */
    public function action(): ?Action {
        return $this->action;
    }
    
    // Setters --
    
    /** @param Response */
    public function setResponse(Response $res) {
        $this->response = $res;
    }

    // Methods --

    /**
     * Search for appropriate controller by route reference according to current request
     * @param string $classManager Classe of routes manager
     * @return string|null Route of targeted controller or null if no match.
     */
    private function getController (string $classManager): ?string {
        $register = new $classManager;
        foreach ($register->router() as $action) {
            if ($action->matchRoute($this->request)) return $action->controller();
        }
        return null;
    }
   
    /**
     * Treatment of a processus before sending response
     * * Analyse and parse URI ; 
     * * Match Request with Action ;
     * * Build the Response with the targeted Controller (or Error if mismatch) ;
     * * Build View Render and enable Response ;
     */
    public function processing() {

        /** @var Controller */
        $controller = null;
        
        $this->request = new Request($_SERVER['REQUEST_URI']);

        if ($this->request->isValid()) {
            
            $path = $this->request->path()[0];

            $section = SECTIONS[$path] ?? null;
            
            if ($section) $controller = $this->getController($section);

            if (!$controller) {
                $this->request = new Request('notfound');
                $controller = $this->getController(self::ERROR_SECTION);
            }

        } else {
            $this->request = new Request('badrequest');
            $controller = $this->getController(self::ERROR_SECTION);
        }

        // Integrity control
        try {
            $controller = new $controller;
            $controller->enable($this, $this->request);
            $controller->execute();
            return;
        } catch (\Exception $AppNotBuilt) { // \Throwable ? to catch both Exception and Error
            // log $AppNotBuilt ?
            header('Location: unavailable.php');
            exit;
        }
    }
}