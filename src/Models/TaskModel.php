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

    public function set($inputId, array $data = [])
    {   
        $this->id = $inputId;
        $sql = "SELECT * FROM tasks WHERE id = $this->id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        if ($result && (count($result) != 0)) {
            //update
            foreach ($result as $key => $value) {
                $this->$key = $value;
            }
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
            $this->updated_at = date('Y-m-d H:i:s');
        } else {
            //create
            $this->title = "";
            $this->description = "";
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        }
    }

    /* public function create($title, $description)
    {
        $sql = "INSERT INTO tasks (title, description, created_at, updated_at) VALUES (:title, :description, :created_at, :updated_at)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'title' => $title,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }

    public function showTask($id)
    {
        $sql = "SELECT * FROM tasks WHERE id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function showAllTasks()
    {
        $sql = "SELECT * FROM tasks";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function edit($id, $title, $description)
    {
        $sql = "UPDATE tasks SET title = :title, description = :description , updated_at = :updated_at WHERE id = :id";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM tasks WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    } */
}
