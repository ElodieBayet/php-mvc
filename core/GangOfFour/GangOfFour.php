<?php

namespace core\GangOfFour;

use phpmvc\{ Action, Manager };
use core\GangOfFour\Controller\GangOfFour as GangOfFourCtrl;

/**
 * Manage Gang Of Four Router
 * {@inheritDoc}
 */
class GangOfFour extends Manager {

    public function router(): array {
        return [
            // uri = /gang-of-four
            new Action( [
                'route'         => 'gang-of-four',
                'controller'    => GangOfFourCtrl::class
            ] )
        ];
    }
}