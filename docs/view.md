## View
##### Передаем параметры одиночно
```php
<?php

require 'fleet/autoload.php';

$view = new View();
$view->set('name', 'John Smith');
$view->set('age', 25);
$view->render('main.php');
```
##### Передаем параметры массивом
```php
<?php

require 'fleet/autoload.php';

$view = new View();
$view->render('main.php', array(
    'name' => 'John Smith',
    'age' => 25
));
```

