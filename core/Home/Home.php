<?php

namespace core\Home;

use phpmvc\{ Action, Manager };
use core\Home\Controller\Home as HomeCtrl;

/**
 * Manager for Home section
 * {@inheritDoc}
 */
class Home extends Manager {

    public function router(): array {
        return [
            // uri = /
            new Action( [
                'route'         => '',
                'controller'    => HomeCtrl::class
            ] )
        ];
    }
}