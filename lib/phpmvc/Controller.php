<?php

namespace phpmvc;

/**
 * Common structure for Controllers
 */
abstract class Controller {

    /** @var Process */
    private $process;

    /** @var Request */
    private $request;

    /** 
     * Generate View and create Response
     */
    abstract protected function execute();
   
    // Getters --

    /** 
     * Return the current process
     * @return Process
     */
    public function process(): Process {
        return $this->process;
    }

    /**
     * Return the current request
     * @return Request
     */
    public function request(): Request {
        return $this->request;
    }

    // Setters --

    /**
     * Enable access to current process and request
     * @param Process $process
     * @param Request $request
     */
    public function enable(Process $process, Request $request) {
        $this->process = $process;
        $this->request = $request;
    }

    /** 
     * Allow controller to implement response
     * @param Response $response
     */
    public function setResponse(Response $response) {
        $this->process->setResponse($response);
    }

}