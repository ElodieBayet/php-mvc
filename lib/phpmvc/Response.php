<?php

namespace phpmvc;

/**
 * Manage a Process Response
 */
class Response {

    /** @var array */
    private $headers = [];

    /** @var string */
    private $body = '';

    /**
     * Build parts for Response
     * @param array $headers List of headers
     * @param string $body HTML body
     */
    function __construct(array $headers, string $body) {
        $this->headers = $headers;
        $this->body = $body;
    }

    /** 
     * Send headers and write body
     */
    public function send(): void {
        foreach ($this->headers as $header) { 
            header($header); 
        }

        echo $this->body; 
    }
}