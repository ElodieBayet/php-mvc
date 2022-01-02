<?php

namespace core\Patron\Controller;

use core\Patron\Model\PatronRepository as Data;
use phpmvc\{ Render, Response, Controller };

/**
 * Manage execution of Patron Page
 * {@inheritDoc}
 */
class Patron extends Controller {

    public function execute() {
        
        // Variable texts
        $inset['title'] = "Patrons";
        $inset['desc'] = "Page de présentation des patrons d'architecture en Génie Logicielle";
        $inset['route'] = $this->request()->path()[0];
        $data = Data::retrieveAll();
        
        // View rendering
        $content = new Render([__DIR__, '..', 'View', 'Index.php'], ['data' => $data]);
        $page = new Render([__ROOT__, 'core', 'Template', 'Layout.php'], ['inset' => $inset, 'content' => $content]);
        
        // Set Response to current Process
        $this->setResponse(new Response(['Content-Type: text/html; charset=UTF8'], $page));
    }
}