<?php

declare(strict_types=1);

namespace Matrix\Foundation;

use Matrix\Foundation\EnvironmentTrait;
use Matrix\Http\Request;

/**
 * Neutral Kernel of application
 *
 * @uses ./config/structure.php
 * @uses ./env.local.php
 * @uses ./env.php If missing ./env.local.php
 */
abstract class AbstractCore
{
    use EnvironmentTrait;

    /** Available languages provided by ./config/structure.php */
    protected static array $appLanguages;

    /** Available routes with properties provided by ./config/structure.php */
    protected static array $appSitemap;

    public function __construct()
    {
        $this->implementEnvironment();
        $this->implementAppComponents();
    }

    private function implementEnvironment(): void
    {
        $environment = '';

        if (is_file('../env.local.php')) {
            $environment = 'env.local.php';
        } elseif (is_file('../env.php')) {
            $environment = 'env.php';
        } else {
            throw new \Exception("Can't find files 'env.local.php' nor 'env.php'");
        }

        require '../' . $environment;

        if (!defined('APP_DEBUG') && !defined('DATABASE')) {
            throw new \Exception("Can't find variables 'APP_DEBUG' and 'DATABASE'");
        }

        $this->setIsDebugging(APP_DEBUG);
    }

    private function implementAppComponents(): void
    {
        if (is_file('../config/structure.php')) {
            $structure = require '../config/structure.php';

            if (!is_array($structure)) {
                throw new \Exception("The file 'config/structure.php' doesn't contain any array structure");
            }

            if (!array_key_exists('mains', $structure) && !array_key_exists('seconds', $structure)) {
                throw new \Exception("Can't find array keys 'mains' and 'seconds' in 'config/structure.php'");
            }

            if (!array_key_exists('languages', $structure)) {
                throw new \Exception("Can't find array key 'languages' in 'config/structure.php'");
            }

            if (!array_key_exists(Request::LANGUAGE, $structure['languages'])) {
                throw new \Exception("Can't find default app language '" . Request::LANGUAGE . "' for 'languages' in 'config/structure.php'");
            }

            self::$appSitemap['mains'] = $structure['mains'];
            self::$appSitemap['seconds'] = $structure['seconds'];
            self::$appLanguages = $structure['languages'];
        } else {
            throw new \Exception("Can't find file 'config/structure.php'");
        }
    }
}