<?php

class Router {

    private $routes = array();
    private $filter = array(
        '*'  => '.+?',
        'i' => '[0-9]++',
        's' => '[A-Za-z]++',
        'a' => '[0-9A-Za-z_-]++'
    );

    public function map($pattern, $callback) {
        $pattern = $this->match($pattern);
        $this->routes[$pattern] = $callback;
    }

    public function addFilter(array $filter) {
        $this->filter = array_merge($this->filter, $filter);
    }

    private function match($route) {
        if (preg_match_all(
            '`(/|\.|)\[([^:\]]*+)(?::([^:\]]*+))?\](\?|)`',
            $route, $matches, PREG_SET_ORDER
        )) {
            $filter = $this->filter;
            foreach($matches as $match) {
                list($input, $prev, $type, $name, $option) = $match;
                if (isset($filter[$type])) $type = $filter[$type];
                if ($prev === '.') $prev = '\.';
                $pattern = '(?:' . ($prev !== '' ? $prev : null);
                $pattern .= '(' . ($name !== '' ? "?P<{$name}>" : null);
                $pattern .= $type . '))' . ($option !== '' ? '?' : null);
                $route = str_replace($input, $pattern, $route);
            }
        } return "`^$route$`u";
    }

    public function run() {
        $route = $this->routes;
        $request = $_SERVER['REQUEST_URI'];
        foreach ($route as $pattern => $callback) {
            if (preg_match($pattern, $request, $option)) {
                array_shift($option);
                if (is_string($callback)) {
                    $callback = explode('@', $callback);
                    $call = call_user_func(array(
                        new $callback[0], $callback[1]
                    ), $option);
                } else $call = call_user_func(
                    $callback, $option
                );
                return $call;
            }
        }
    }

}
