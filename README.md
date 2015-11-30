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
