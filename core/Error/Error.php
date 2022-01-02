<?php

namespace core\Error;

use phpmvc\{ Action, Manager };
use core\Error\Controller\{ BadRequest, NotFound };

/**
 * Manager for Error section
 * {@inheritDoc}
 */
class Error extends Manager {
    
    public function router(): array {
        return [
            // uri = any {if original Request has mistake}
            new Action( [
                'route'         => 'badrequest',
                'controller'    => BadRequest::class
            ] ),
            // uri = any {if route not found}
            new Action( [
                'route'         => 'notfound',
                'controller'    => NotFound::class
            ] )
        ];
    }
}