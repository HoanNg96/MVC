<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskRepository;

class TasksController extends Controller
{
    function index()
    {

        $tasks = new TaskRepository();

        $d['tasks'] = $tasks->getAll([]);
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["submit"])) {

            echo $_POST["title"];
            /* $task = new TaskRepository();

            if ($task->add($_POST["title"], $_POST["description"])) {
                header("Location: " . URL_WEBROOT . "Tasks/index");
            } */
        }

        $this->render("create");
    }

    function edit($id)
    {
        require(ROOT . 'Models/TaskModel.php');
        $task = new TaskRepository();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"])) {
            if ($task->edit($id, $_POST["title"], $_POST["description"])) {
                header("Location: " . URL_WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        require(ROOT . 'Models/TaskModel.php');

        $task = new TaskRepository();
        if ($task->delete($id)) {
            header("Location: " . URL_WEBROOT . "tasks/index");
        }
    }

    /* function index()
    {
        require(ROOT . 'Models/TaskModel.php');

        $tasks = new TaskModel();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            require(ROOT . 'Models/TaskModel.php');

            $task = new TaskModel();

            if ($task->create($_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        require(ROOT . 'Models/TaskModel.php');
        $task = new TaskModel();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"])) {
            if ($task->edit($id, $_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        require(ROOT . 'Models/TaskModel.php');

        $task = new TaskModel();
        if ($task->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    } */
}
