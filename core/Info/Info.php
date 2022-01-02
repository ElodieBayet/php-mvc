<?php

namespace core\Info;

use phpmvc\{ Action, Manager };
use core\Info\Controller\Info as InfoCtrl;

/**
 * Manager for Info section
 * {@inheritDoc}
 */
class Info extends Manager {

    public function router(): array {
        return [
            // uri = /info
            new Action( [
                'route'         => 'info',
                'controller'    => InfoCtrl::class
            ] )
        ];
    }
}