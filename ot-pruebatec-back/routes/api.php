<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/allpost', 'PostsController@getPostsAll');
Route::post('/addpost', 'PostsController@addPost');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
