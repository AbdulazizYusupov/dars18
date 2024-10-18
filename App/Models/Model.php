<?php

namespace App\Models;
use PDO;
use App\Models\Inter;

abstract class Model implements Inter
{
    public static $table;
    public function connect()
    {
        $db = new PDO("mysql:host=localhost;dbname=homework", "root", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    public function all()
    {
        $sql = "SELECT * FROM " . static::$table;
        $res = $this->connect()->query($sql);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $query = "INSERT INTO " . static::$table . " ({$columns})  VALUES ({$values})";
        $stmt = $this->connect()->prepare($query);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function find($id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = '{$id}'";
        $query = $this->connect()->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function update($id, $data)
    {
        $setParts = [];
        $params = [];

        foreach ($data as $key => $value) {
            $setParts[] = "{$key} = :{$key}";
            $params[":{$key}"] = $value;
        }

        $cleanedString = implode(", ", $setParts);

        $query = "UPDATE " . static::$table . " SET {$cleanedString} WHERE user_id = :id ";

        $params[':id'] = $id;

        $stat = $this->connect()->prepare($query);

        foreach ($params as $key => $value) {
            $stat->bindValue($key, $value);
        }
        return $stat->execute();
    }
    public function delete($id)
    {
        $query = "DELETE FROM " . static::$table . " WHERE id = {$id}";
        $stat = $this->connect()->prepare($query);
        if ($stat->execute()) {
            header("location: /");
        } else {
            return false;
        }
    }
}
