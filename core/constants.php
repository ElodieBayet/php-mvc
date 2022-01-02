<?php
/** @var array DATABASE :: Connection logins */
const DATABASE = [
    'pilot'         => 'mysql',
    'host'          => '127.0.0.1',
    'port'          => '3306',
    'dbname'        => 'phpmvc',
    'charset'       => 'utf8mb4',
    'user'          => 'root',
    'password'      => ''
];

/** @var array SECTIONS :: Associations of routes and class-managers */
const SECTIONS = [
    ''              => 'core\Home\Home',
    'gang-of-four'  => 'core\GangOfFour\GangOfFour',
    'patron'        => 'core\Patron\Patron',
    'info'          => 'core\Info\Info'
];