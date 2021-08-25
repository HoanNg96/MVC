<?php

namespace MVC\Core;

interface ResourceModelInterface
{
    function _inni($table, $id, $model);
    function save($model);
    function delete($model);
}
