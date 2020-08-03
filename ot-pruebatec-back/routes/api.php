<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([

    'prefix' => 'post'

], function () {

    Route::get('/all', 'PostsController@getPostAll');
    // Route::get('/detail/{id}', 'ImagenController@detail');
    Route::post('/add', 'PostsController@addPost');
    Route::put('/update/{id}', 'PostsController@edit');
    Route::delete('/delete/{id}', 'PostsController@delete');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::fallback(function () {
    return response()->json(['mensaje' => 'ruta no encontrada'], 404);
});
