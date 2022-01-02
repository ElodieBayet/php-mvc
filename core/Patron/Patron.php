<?php

namespace core\Patron;

use phpmvc\{ Action, Manager };
use core\Patron\Controller\{ Patron as PatronCtrl, MVC, MVVM, MVP };

/**
 * Manager for Patron section
 * {@inheritDoc}
 */
class Patron extends Manager {

    public function router(): array {
        return [
            // uri = /patron
            new Action( [
                'route'         => 'patron', 
                'controller'    => PatronCtrl::class
            ] ),
            // uri = /patron/model-vue-controller
            new Action( [
                'route'         => 'model-view-controller', 
                'controller'    => MVC::class
            ] ),
            // uri = /patron/model-vue-vuemodel
            new Action( [
                'route'         => 'model-view-viewmodel', 
                'controller'    => MVVM::class
            ] ),
            // uri = /patron/model-vue-presentation
            new Action( [
                'route'         => 'model-view-presentation', 
                'controller'    => MVP::class
            ] )
        ];
    }
}