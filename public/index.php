<?php

define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('URL_WEBROOT', str_replace("public", "", dirname($_SERVER['SCRIPT_NAME'])));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]) . 'src/');
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
/* 
define('RELATIVE_BASEPATH', str_replace("public", "" , dirname($_SERVER['SCRIPT_NAME']))); */

require BASEPATH . '/vendor/autoload.php';

//require(ROOT . 'Config/core.php');

//require(ROOT . 'router.php');
//require(ROOT . 'request.php');
//require(ROOT . 'dispatcher.php');

use MVC\Config\Database;
use MVC\Core\Model;
use MVC\Core\Controller;

use MVC\Router;
use MVC\Request;
use MVC\Dispatcher;

$dispatch = new Dispatcher();
$dispatch->dispatch();
