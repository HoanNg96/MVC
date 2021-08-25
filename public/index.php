<?php

define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]) . 'src/');
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

//require(ROOT . 'Config/core.php');

//require(ROOT . 'router.php');
//require(ROOT . 'request.php');
//require(ROOT . 'dispatcher.php');


require BASEPATH . '/vendor/autoload.php';

use MVC\Dispatcher;
use MVC\Request;
use MVC\Router;

$dispatch = new Dispatcher();
$dispatch->dispatch();

/* $router = new Router();
$request = new Request();
print_r($request); */