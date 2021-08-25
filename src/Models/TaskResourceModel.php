<?php

namespace MVC\Models;

use MVC\Models\TaskModel;
use MVC\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        parent::_inni("task", "taskId", new TaskModel());
    }
}
