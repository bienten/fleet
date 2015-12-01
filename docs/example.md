## Example
```php
<?php

require 'fleet/autoload.php';

$route = new Router();
$view = new View();

$route->map('/blog/[a:category]/page/[i:page]',
    function($param) use($view) {
        $view->render('test.php', array(
            'title' => 'Blog Application',
            'category' => $param['category'],
            'page' => $param['page']
        ));
    }
);

$route->run();
```
