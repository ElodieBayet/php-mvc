<?php
declare(strict_types=1);

/** @var string Preserve root of application */
const __ROOT__ = __DIR__;

/** 
 * @var array DATABASE :: Connection logins
 * @var array SECTIONS :: Associations of routes and class-managers 
 */
require 'core/constants.php';

/** Class Auto Include */
require './lib/phpmvc/ClassIncluder.php';
ClassIncluder::register( ['phpmvc' => 'lib'] );

/** Start Processus... */
use phpmvc\Process;
$process = new Process;
$process->processing();
$process->response()->send();