# Router
##### callback route
```php
<?php

require 'kernel/Router.php';

$route = new Router();

# url => /hello/world

$route->map('/hello/(\w+)', function($who) {
    echo "Hello {$who}";
});

$route->run();
```
##### controller@action route
```php
<?php

require 'kernel/Router.php';

$route = new Router();
$route->map('/', 'className@actionName');
$route->run();
```
# View
##### set option
```php
<?php

require 'kernel/View.php';

$view = new View();
$view->set('name', 'John Smith');
$view->set('age', 25);
$view->render('main.php');
```
##### array option
```php
<?php

require 'kernel/View.php';

$view = new View();
$view->render('main.php', array(
    'name' => 'John Smith',
    'age' => 25
));
```
