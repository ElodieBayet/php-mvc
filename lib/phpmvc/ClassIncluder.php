<?php

/**
 * Auto Include Classes
 */
class ClassIncluder {

    /** @var array */
    private static $namespaces = [];

    // Methods --

    /**
     * Register classes and optionally define special libraries if so.
     * @param array $namespaces 
     * Associations of namespace and directory.
     * * For example : [ 'namespace' => 'dir' ] will set 'to/dir/mynsp' or 'to\dir\mynsp' according to your system
     * @uses spl_autoload_register() and callback self::loader
     */
    public static function register(array $namespaces = []): void {
        
        if ($namespaces) self::$namespaces = $namespaces;
        
        spl_autoload_register('self::loader');
    }

    /**
     * @param string $address Autoimplemented address of classes
     * @return bool 
     */
    private static function loader(string $address): bool {

        $filepath = str_replace('\\', DIRECTORY_SEPARATOR, $address);

        foreach (self::$namespaces as $ns => $dir) {
            if (str_contains($address, $ns)) {
                $filepath = str_replace($ns, $dir.DIRECTORY_SEPARATOR.$ns, $address);
            }
        }

        $file = __ROOT__.DIRECTORY_SEPARATOR.$filepath.'.php';

        if (is_file($file)) {
            require $file;
            return true;
        } 
        return false;
    }
}