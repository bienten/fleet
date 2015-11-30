<?php

class View {

    private $data = array();
    private $path = './view/';
    
    public function __construct($path = null) {
        if ($path) {
            $this->path = $path;
        }
    }

    public function get($name) {
        return $this->data[$name];
    }

    public function set($name, $value) {
        $this->data[$name] = $value;
    }

    public function render($name, $data = array()) {

        if (!empty($data)) {
            foreach ($data as $k => $v) {
                $this->set($k, $v);
            }
            extract($this->data);
        }

        if (file_exists($this->path . $name)) {
            include $this->path . $name;
        } else die ('Template not found!');

    }

}
