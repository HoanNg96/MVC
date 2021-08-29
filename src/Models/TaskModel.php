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
        $sql = "SELECT * FROM tasks WHERE id = $this->id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        if ($this->id != 0) {
            //update
            $this->created_at = $result['created_at'];
            $this->updated_at = date('Y-m-d H:i:s');
        } else {
            //create
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        }
    }
}
