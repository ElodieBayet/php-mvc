<?php

declare(strict_types=1);

/** Class Autoloader */
require '../vendor/matrix/Autoloader.php';
Autoloader::register(
    [
        'Matrix' => 'vendor',
    ],
    '..'
);

/** Start Processus */
use Matrix\Foundation\HttpCore;

try {
    $core = new HttpCore;
} catch (\Exception $e) {
    if ($_SERVER['SERVER_NAME'] === 'php-mvc.local') {
        echo "<pre>From 'fr/index.php' : " . $e->getMessage() . "</pre>";
        exit;
    }
    header('Location: /unavailable.php', true, 307);
    exit;
}

/** @var Response $response */
$response = $core->handle();
$response->send();