<?php

namespace MVC\Models;

use MVC\Models\TaskModel;
use MVC\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct($id, $array)
    {
        $TaskModel_obj = new TaskModel();
        $TaskModel_obj->set("$id", $array);
        $TaskModel_arr = $TaskModel_obj->get();
        foreach ($TaskModel_arr as $key => $value)
        {
            $TaskModel_obj->$key = $value;
        }
        parent::_inni("tasks", "id", $TaskModel_obj);
    }
}
