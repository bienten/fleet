<?php

class Loader {

    private $path = array();

    public function add($path) {
        $this->path[] = $path;
    }

    public function autoload($path = array()) {

        $path = array_merge($this->path, $path);

        spl_autoload_register(function($class) use($path) {
            foreach($path as $way) {
                if (file_exists($way.DIRECTORY_SEPARATOR.$class.'.php')) {
                    require_once $way.DIRECTORY_SEPARATOR.$class.'.php';
                    return;
                }
            }
        });

    }

}
