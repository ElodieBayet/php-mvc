<?php

namespace core\Error\Controller;

use phpmvc\{ Render, Response, Controller };

/**
 * Manage execution in case of Bad Request
 * {@inheritDoc}
 */
class BadRequest extends Controller {

    public function execute() {
        
        // Variable texts
        $inset['title'] = "Requête invalide";
        $inset['desc'] = "La requête est mal formulée";
        $inset['route'] = $this->request()->path()[0];
        
        // View rendering
        $content = new Render([__DIR__, '..', 'View', 'BadRequest.php']);
        $page = new Render([__ROOT__, 'core', 'Template', 'Layout.php'], ['inset' => $inset, 'content' => $content] );
        
        // Set Response to current Process
        $this->setResponse(new Response(['400 Bad Request', 'Content-Type: text/html; charset=UTF8'], $page));
    }
}