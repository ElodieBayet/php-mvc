<?php

namespace core\Error\Controller;

use phpmvc\{ Render, Response, Controller };

/**
 * Manage execution in case of content Not Found
 * {@inheritDoc}
 */
class NotFound extends Controller {

    public function execute() {
        
        // Variable texts
        $inset['title'] = "Ressource non trouvée";
        $inset['desc'] = "La ressource demandée n'existe pas";
        $inset['route'] = $this->request()->path()[0];
        
        // View rendering
        $content = new Render([__DIR__, '..', 'View', 'NotFound.php']);
        $page = new Render([__ROOT__, 'core', 'Template', 'Layout.php'], ['inset' => $inset, 'content' => $content] );
        
        // Set Response to current Process
        $this->setResponse(new Response(['404 Not Found', 'Content-Type: text/html; charset=UTF8'], $page));
    }
}