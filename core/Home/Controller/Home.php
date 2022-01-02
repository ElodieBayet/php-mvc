<?php

namespace core\Home\Controller;

use phpmvc\{ Render, Controller, Response };

/**
 * Manage execution of Home Page
 * {@inheritDoc}
 */
class Home extends Controller {

    public function execute() {

        // Variable texts
        $inset['title'] = "Design Patterns";
        $inset['desc'] = "Bases liées à l'apprentissage des Design Patterns";
        $inset['route'] = $this->request()->path()[0];
        
        // View rendering
        $content = new Render([__DIR__, '..', 'View', 'Index.php']);
        $page = new Render([__ROOT__, 'core', 'Template', 'Layout.php'], ['inset' => $inset, 'content' => $content]);

        // Set Response to current Process
        $this->setResponse(new Response(['Content-Type: text/html; charset=UTF8'], $page));
    }
}