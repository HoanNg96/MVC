<?php

namespace MVC\Models;

use MVC\Config\Database;
use MVC\Core\Model;
use PDO;

class SinhvienModel extends Model
{
    public int $id;
    public string $ten;
    public int $tuoi;
    public string $diachi;
    public string $created_at;
    public string $updated_at;

    public function get()
    {   
        $array = [
            "id" => $this->id,
            "ten" => $this->ten, 
            "tuoi" => $this->tuoi, 
            "diachi" => $this->diachi, 
            "created_at" => $this->created_at, 
            "updated_at" => $this->updated_at
        ];
        return $array;
    }

    public function set($id, $ten, $tuoi, $diachi)
    {
        $this->id = $id;
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->diachi = $diachi;
        if ($this->id != 0) {
            //update
            $sql = "SELECT * FROM sinhvien WHERE id = $this->id";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);
            $this->created_at = $result['created_at'];
            $this->updated_at = date('Y-m-d H:i:s');
        } else {
            //create
            $sql = "SELECT * FROM sinhvien ORDER BY id DESC";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $sql = "ALTER TABLE sinhvien AUTO_INCREMENT = " . ($result['id']+1);
                $req = Database::getBdd()->prepare($sql);
                $req->execute();
            } else {
                $sql = "ALTER TABLE sinhvien AUTO_INCREMENT = 1";
                $req = Database::getBdd()->prepare($sql);
                $req->execute();
            }
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        }
    }
}
