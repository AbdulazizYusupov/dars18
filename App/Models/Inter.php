<?php

namespace App\Models;

interface Inter
{
    public function connect();
    public function all();
    public function create($data);
    public function find($id);
    public function update($id, $data);
    public function delete($id);
}