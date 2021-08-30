<?php

namespace MVC\Models;

class SinhvienRepository
{
    //$model la 1 object
    public function add($model)
    {
        $object = new SinhvienResourceModel;
        $object->__construct();
        return $object->save($model);
    }
    public function get($id)
    {
        $object = new SinhvienResourceModel;
        $object->__construct();
        return $object->get($id);
    }
    public function delete($model)
    {
        $object = new SinhvienResourceModel;
        $object->__construct();
        return $object->delete($model);
    }
    public function getAll($model)
    {
        $object = new SinhvienResourceModel;
        $object->__construct();
        return $object->getAll($model);
    }
}
