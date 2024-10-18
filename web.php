<?php 

use App\Routes\Route;
use App\Controllers\ProductController;
use App\Controllers\IndexController;

Route::get('/', [ProductController::class, "index"]);
Route::post('/', [ProductController::class,'index']);
Route::post('/create', [ProductController::class,'create']);

Route::get('/index',[IndexController::class,'index']);
Route::get('/store',[IndexController::class,'store']);