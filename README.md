# Fleet Framework

## Быстрый старт

```php
<?php

require 'fleet/autoload.php';

$route = new Router();
$view = new View();

$route->map('/[s:hello]', function($param) use($view) {
    $view->set('world', $param['hello']);
    $view->render('test.php');
});

$route->run();
```

## Apache
```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]

```

## Документация

[Router](https://github.com/bienten/fleet/blob/master/docs/route.md)
[View](https://github.com/bienten/fleet/blob/master/docs/view.md)
[Example](https://github.com/bienten/fleet/blob/master/docs/example.md)
