# simple-app

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
