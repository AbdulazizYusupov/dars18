<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        $productModel = new Product();
        $models = $productModel->all();
        return view('index', 'Products', $models);
    }
    public function create()
    {
        if (isset($_POST['ok'])) {
            $data = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
            ];
            $productModel = new Product();
            $productModel->create($data);
            header('location: /');
        }
    }
    public function delete()
    {
        if (isset($_POST['del'])) {
            $id = $_POST['id'];
            $productModel = new Product();
            $productModel->delete($id);
        }
    }
    public function show()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $productModel = new Product();
            $productModel->find($id);
            return view('/', 'Show');
        }
    }
    public function update()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $data = [
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            ];

            $productModel = new Product();
            $productModel->update($id, $data);
        }
        header('location: /');
    }
}