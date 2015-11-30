<?php

require 'kernel/autoload.php';

$route = new Router();
$view = new View();

$route->map('/blog/(\w+)/page/(\d+)',
    function($category, $page) use($view) {
        $view->render('test.php', array(
            'title' => 'Blog Application',
            'category' => $category,
            'page' => $page
        ));
    }
);

$route->run();
