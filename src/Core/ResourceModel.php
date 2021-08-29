<?php

namespace MVC\Core;

use MVC\Core\ResourceModelInterface;
use MVC\Config\Database;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM $this->table where $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchObject(get_class($this->model)));
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchAll(PDO::FETCH_CLASS, get_class($this->model)));
    }

    public function save($model)
    {
        $arrayModel = ($this->model)->getProperties($model);

        $id = $arrayModel[$this->id];

        $strModel_array = [];
        foreach (array_keys($arrayModel) as $val) {
            $strModel_array[$val . " = :" . $val] = "";
        }

        $stringModel = implode(", ", array_keys($strModel_array));

        if ($id == 0) {
            $sql = "INSERT into $this->table set $stringModel";
        } else {
            $sql = "UPDATE $this->table SET $stringModel WHERE $this->id = $id";
        }

        $req = Database::getBdd()->prepare($sql);
        return $req->execute($arrayModel);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        /* $req->execute(); */
        return $req->execute();
    }
}
