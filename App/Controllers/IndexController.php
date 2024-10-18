<?php

namespace App\Controllers;

use App\Models\Product;

class IndexController
{
    public function index()
    {
        $productModel = new Product();
        $models = $productModel->all();
        return api($models);
    }
    public function store()
    {
        return api($_POST);
    }
}