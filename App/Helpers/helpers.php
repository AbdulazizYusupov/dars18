<?php

use App\Helpers\Views;

if (!function_exists("dd")) {
    function dd(...$data)
    {
        echo "<body bgcolor='grey'>";
        echo "<pre style='background-color:black; color:#0dbb2a; font-family: monospace'>";
        print_r($data);
        echo "</pre>";
        exit;
    }
}

if (!function_exists("view")) {
    function view($view, $title, $models = [])
    {
        Views::make($view, $title, $models);
    }
}
if (!function_exists('api')) {
    function api($data, $status = 200)
    {
        header('Content-Type: application/json');

        http_response_code($status);

        echo json_encode(['status' => $status, 'data' => $data], JSON_PRETTY_PRINT);
        exit;
    }
}