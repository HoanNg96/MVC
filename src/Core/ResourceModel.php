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

    function _inni($table, $id, $model)
    {
        $this->table = $table;
        $this->id - $id;
        $this->model = $model;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM $this->table where id = $id";
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
        $arrayModel = array(
            "id" => "null",
            "title" => "This is title",
            "name" => "This is name"
        );

        $id = $arrayModel[$this->id];

        $stringModel = "title = :title, name = :name";

        if ($arrayModel['myId'] == null) {
            $sql = "INSERT into $this->table set $stringModel";
        } else {
            $sql = "UPDATE $this->table SET $stringModel WHERE id = $this->id";
        }

        $req = Database::getBdd()->prepare($sql);
        return $req->execute($arrayModel);
    }

    public function delete($id)
    {
        $sql = "DELETE * FROM $this->table WHERE id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
    }
}
