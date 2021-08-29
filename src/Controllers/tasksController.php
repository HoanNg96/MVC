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
            //get form data
            $id = 0;
            $title = $_POST["title"];
            $description = $_POST["description"];
            $form = ['title' => $title, 'description' => $description];
            //secure form
            $form = $this->secure_form($form);
            $taskModel_obj = new TaskModel;
            $taskModel_obj->set($id, $form['title'], $form['description']);
            $taskss = new TaskRepository();

            if ($taskss->add($taskModel_obj)) {
                header("Location: " . URL_WEBROOT . "Tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $tasks = new TaskRepository();
        $d["tasks"] = $tasks->get($id);

        if (isset($_POST["title"])) {
            //get form data
            $id = $id;
            $title = $_POST["title"];
            $description = $_POST["description"];
            $form = ['title' => $title, 'description' => $description];
            //secure form
            $form = $this->secure_form($form);
            $taskModel_obj = new TaskModel;
            $taskModel_obj->set($id, $form['title'], $form['description']);

            if ($tasks->add($taskModel_obj)) {
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
