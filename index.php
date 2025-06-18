<?php

/** @var string $lang :: Current language */
$lang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

if ($lang === 'fr' || $lang === 'en') {
    // Redirect to local version if so
    if ($_SERVER['SERVER_NAME'] === 'php-webapp.local') {
        header('Location: /' . $lang . '/');
        exit;    
    }
    header('Location: https://' . $_SERVER['SERVER_NAME'] . '/' . $lang . '/');
    exit;
}

require 'templates/root.php';
