<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/downloads/{id}', [PostController::class, 'download']);
Route::get('/downloads', [PostController::class, 'downloads']);
Route::resource('/posts', PostController::class);
Route::get('/res-image/{id}', [PostController::class, 'resImage']);
