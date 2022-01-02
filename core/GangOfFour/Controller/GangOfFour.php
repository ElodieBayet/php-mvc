<?php

namespace core\GangOfFour\Controller;

use phpmvc\{ Render, Controller, Response };

/**
 * Manage execution of Gang of Four Page
 * {@inheritDoc}
 */
class GangOfFour extends Controller {
    
    public function execute() {
        
        // Variable texts
        $inset['title'] = "Gang of Four";
        $inset['desc'] = "Page descriptive du “Gang-of-Four” en Design Pattern";
        $inset['route'] = $this->request()->path()[0];
        
        // View rendering
        $content = new Render([__DIR__, '..', 'View', 'Index.php']); 
        $page = new Render([__ROOT__, 'core', 'Template', 'Layout.php'], ['inset' => $inset, 'content' => $content] );
        
        // Set Response to current Process
        $this->setResponse(new Response(['Content-Type: text/html; charset=UTF8'], $page));
    }
}