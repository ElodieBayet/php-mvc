<?php

namespace phpmvc;

/**
 * Manage View render
 */
class Render implements \ArrayAccess {
    
    /** @var string */
    private $file = '';

    /** @var array */
    private $data = [];

    /**
     * Build a render with targeted file and send data View.
     * 
     * @param array $viewPath 
     * Path of the file to include. Must be an array of each directory names without '/' or '\'. The constructor sets appropriate '/' or '\' according to your system.
     * * For example : [ 'folder' , 'to' , 'file.php' ] will set 'folder/to/file.php' or 'folder\to\file.php'
     * 
     * @param array $dataSet
     * List of data to throw into the View.
     * * For example : [ 'title' => "My Custom Title" ] will allow to do $this['title'] in your HTML template
     */
    public function __construct(array $viewPath, array $dataSet = []) {
        if ($viewPath) {
            $this->file = implode(DIRECTORY_SEPARATOR, $viewPath);
        }
        $this->data = $dataSet;
    }
 
    // Getters --

    /**
     * Implentation of "ArrayAccess" :: Read a value at 'key' position
     * @param mixed $offset
     * @return mixed
     * @see https://www.php.net/manual/fr/class.arrayaccess
     */
    public function offsetGet(mixed $offset): mixed {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    /**
     * Implentation of "ArrayAccess" :: Specify a 'key' exists
     * @param mixed $offset
     * @return bool
     * @see https://www.php.net/manual/fr/class.arrayaccess
     */
    public function offsetExists(mixed $offset): bool {
        return array_key_exists($offset, $this->data);
    }

    // Setters -- 

    /**
     * Implentation of "ArrayAccess" :: Set a value at 'key' position
     * @param mixed $offset
     * @param mixed $value
     * @see https://www.php.net/manual/fr/class.arrayaccess
     */
    public function offsetSet(mixed $offset, mixed $value): void {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * Implentation of "ArrayAccess" :: Delete an array element at 'key' position
     * @param mixed $offset
     * @see https://www.php.net/manual/fr/class.arrayaccess
     */
    public function offsetUnset(mixed $offset): void {
        unset($this->data[$offset]);
    }

    // Methods --
 
    /**
     * Implementation of "Magic method" :: Returns a string instead of class instance in a string context
     * @return string
     */
    public function __toString(): string {
        if ($this->file && is_file($this->file)) {
            ob_start();
            include $this->file;
            return ob_get_clean();
        } else {
            return '[!] - No View found : '.$this->file;
        }
    }
}