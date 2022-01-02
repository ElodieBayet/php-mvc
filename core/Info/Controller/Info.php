<?php

namespace core\Info\Controller;

use phpmvc\{ Render, Controller, Response };

/**
 * Manage execution of Information Page
 * {@inheritDoc}
 */
class Info extends Controller {

    public function execute() {
        
        // Variable texts
        $inset['title'] = "Informations";
        $inset['desc'] = "Renseignements sur l'application, son fonctionnement et son contenu";
        $inset['route'] = $this->request()->path()[0];
        
        // View rendering
        $content = new Render([__DIR__, '..', 'View', 'Index.php']);
        $page = new Render([__ROOT__, 'core', 'Template', 'Layout.php'], ['inset' => $inset, 'content' => $content] );
        
        // Set Response to current Process
        $this->setResponse(new Response(['Content-Type: text/html; charset=UTF8'], $page));
    }
}