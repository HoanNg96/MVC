<?php

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        parent::_inni("task", "taskId", new TaskModel());
    }
}
