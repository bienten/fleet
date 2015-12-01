### Класс Router

##### Фильтрация параметров
```
'*' => '.+?' # любое значение параметра
'i' => '[0-9]++' # только цифры
's' => '[A-Za-z]++' # только буквы
'a' => '[0-9A-Za-z_-]++' # буквы, цифры и _ -
```

Так же вы можете добавлять свои фильтры
```php
$route->addFilter(array('m', '[1-2]'));
```
##### Callback роутер
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
##### class@method роутер
```php
<?php

require 'fleet/autoload.php';

$route = new Router();
$route->map('/', 'className@actionName');
$route->run();
```
