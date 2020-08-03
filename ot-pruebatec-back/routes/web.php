<?php

use Illuminate\Support\Facades\Route;



Route::get('/prueba', 'PostsController@getPostAll');
Route::post('/addpost', 'PostsController@addPost');
