<?php

use MVC\Core\Model;
use MVC\Core\ResourceModel;
use MVC\Dispatcher;
use MVC\Models\TaskModel;

define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]) . 'src/');
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

//require(ROOT . 'Config/core.php');

//require(ROOT . 'router.php');
//require(ROOT . 'request.php');
//require(ROOT . 'dispatcher.php');


use MVC\Models\TaskResourceModel;
require BASEPATH . '/vendor/autoload.php';

/* $dispatch = new Dispatcher();
$dispatch->dispatch(); */

/* $x = new TaskResourceModel("5", ["title" => "task 3"]);
$x->save($x->model); */

