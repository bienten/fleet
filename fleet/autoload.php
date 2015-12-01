<?php

require 'Loader.php';

$loader = new Loader();
$loader->add(dirname(__FILE__));
$loader->autoload();
$loader = null;
