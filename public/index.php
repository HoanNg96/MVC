<?php

define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('URL_WEBROOT', str_replace("public", "", dirname($_SERVER['SCRIPT_NAME'])));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]) . 'src/');
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require BASEPATH . '/vendor/autoload.php';

//require(ROOT . 'Config/core.php');

//require(ROOT . 'router.php');
//require(ROOT . 'request.php');
//require(ROOT . 'dispatcher.php');

use MVC\Config\Database;
use MVC\Core\Model;
use MVC\Core\Controller;
use MVC\Core\ResourceModel;
use MVC\Router;
use MVC\Request;
use MVC\Dispatcher;
use MVC\Models\TaskModel;

$dispatch = new Dispatcher();
$dispatch->dispatch();

/* $x = new TaskModel;
$x->set(0, 'hm', 'hm');
$y = new ResourceModel;
$y->_init("tasks", "id", new TaskModel);
$y->save($x); */