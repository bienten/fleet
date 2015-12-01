# Router
##### route filters
```
'*' => '.+?'
'i' => '[0-9]++'
's' => '[A-Za-z]++'
'a' => '[0-9A-Za-z_-]++'
```
##### callback route
```php
<?php

require 'fleet/autoload.php';

$route = new Router();

# url => /hello/world

$route->map('/hello/[s:who]', function($param) {
    echo "Hello {$param['who']}";
});

$route->run();
```
##### controller@action route
```php
<?php

require 'fleet/autoload.php';

$route = new Router();
$route->map('/', 'className@actionName');
$route->run();
```
# View
##### set option
```php
<?php

require 'fleet/autoload.php';

$view = new View();
$view->set('name', 'John Smith');
$view->set('age', 25);
$view->render('main.php');
```
##### array option
```php
<?php

require 'fleet/autoload.php';

$view = new View();
$view->render('main.php', array(
    'name' => 'John Smith',
    'age' => 25
));
```
# Router & View
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
