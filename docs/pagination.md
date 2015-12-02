## Pagination
##### Постраничная навигация
```php
<?php

require 'fleet/autoload.php';

$route = new Router();

$route->map('/page/[i:page]', function($p) {

    $content = array(
        1 => array('id' => '1', 'name' => 'John Smith'),
        2 => array('id' => '2', 'name' => 'John Smith'),
        3 => array('id' => '3', 'name' => 'John Smith'),
        4 => array('id' => '4', 'name' => 'John Smith'),
        5 => array('id' => '5', 'name' => 'John Smith'),
        6 => array('id' => '6', 'name' => 'John Smith'),
        7 => array('id' => '7', 'name' => 'John Smith'),
        8 => array('id' => '8', 'name' => 'John Smith'),
        9 => array('id' => '9', 'name' => 'John Smith'),
        10 => array('id' => '10', 'name' => 'John Smith')
    );

    $total = count($content);

    $page = new Pagination('/page/');
    $page->total($total);
    $page->record(5);
    $page->page($p['page']);

    $change = array_slice($content, $page->start(), $page->limit());

    foreach ($change as $k => $v) {
        echo $v['id'] . ':' . $v['name'] . '<br/>';
    }

    echo $page->render();

});

$route->run();
```
