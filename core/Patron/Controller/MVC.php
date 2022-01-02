<?php

namespace core\Patron\Controller;

use core\Patron\Model\PatronRepository as Data;
use phpmvc\{ Render, Response, Controller };

/**
 * Manage execution of MVC Page
 * {@inheritDoc}
 */
class MVC extends Controller {

    public function execute() {

        // Variable texts
        $inset['title'] = "Model View Controller";
        $inset['desc'] = "Page descriptive du patron d'architecture Modèle-Vue-Contrôleur";
        $inset['route'] = $this->request()->path()[1];
        $data = Data::retrieveOne($inset['route']);
        
        // View rendering
        $content = new Render([__DIR__, '..', 'View', 'ModelViewController.php'], ['data' => $data]);
        $page = new Render([__ROOT__, 'core', 'Template', 'Layout.php'], ['inset' => $inset, 'content' => $content] );
        
        // Set Response to current Process
        $this->setResponse(new Response(['Content-Type: text/html; charset=UTF8'], $page));
    }
}