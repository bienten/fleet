<?php

class Router {

    private $route = array();

    public function map($pattern, $callback) {

        $pattern = '#^' . $pattern . '#';
        $this->route[$pattern] = $callback;

    }

    public function run() {

        $route = $this->route;
        $request = $_SERVER['REQUEST_URI'];

        foreach ($route as $pattern => $callback) {
            if (preg_match($pattern, $request, $option)) {
                array_shift($option);
                if (is_string($callback)) {
                    $callback = explode('@', $callback);
                    $c = call_user_func_array(array(
                        new $callback[0], $callback[1]
                    ), $option);
                } else $c = call_user_func_array(
                    $callback, $option
                );
                return $c;
            }
        }

    }

}
