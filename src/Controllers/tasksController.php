<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskModel;
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
        if (isset($_POST["title"])) {

            $id = 0;
            $title = $_POST["title"];
            $description = $_POST["description"];
            $taskModel_obj = new TaskModel;
            $taskModel_obj->set($id, $title, $description);
            $task = new TaskRepository();

            if ($task->add($taskModel_obj)) {
                header("Location: " . URL_WEBROOT . "Tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task = new TaskRepository();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"])) {
            if ($task->edit($id, $_POST["title"], $_POST["description"])) {
                header("Location: " . URL_WEBROOT . "Tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = new TaskRepository();

        if ($task->delete($id)) {
            header("Location: " . URL_WEBROOT . "Tasks/index");
        }
    }
}
