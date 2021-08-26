<?php

namespace MVC\Core;

class Model
{
    public function getProperties($object)
    {
        $properties = get_object_vars($object);
        return $properties;
    }
}
