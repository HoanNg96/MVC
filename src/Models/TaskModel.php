<?php

namespace MVC\Models;

use MVC\Config\Database;
use MVC\Core\Model;
use PDO;

class TaskModel extends Model
{
    public int $id;
    public string $title;
    public string $description;
    public string $created_at;
    public string $updated_at;

    public function get()
    {
        $array = [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
        return $array;
    }

    public function set($id, $title, $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        if ($this->id != 0) {
            //update
            $sql = "SELECT * FROM tasks WHERE id = $this->id";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);
            $this->created_at = $result['created_at'];
            $this->updated_at = date('Y-m-d H:i:s');
        } else {
            //create
            $sql = "SELECT * FROM tasks ORDER BY id DESC";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $sql = "ALTER TABLE tasks AUTO_INCREMENT = " . ($result['id'] + 1);
                $req = Database::getBdd()->prepare($sql);
                $req->execute();
            } else {
                $sql = "ALTER TABLE tasks AUTO_INCREMENT = 1";
                $req = Database::getBdd()->prepare($sql);
                $req->execute();
            }
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        }
    }
}
