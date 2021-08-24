<?php
    class Model
    {
        public function getProperties($object)
        {
            $result = get_object_vars($object);
            return $result;
        }
    }
?>