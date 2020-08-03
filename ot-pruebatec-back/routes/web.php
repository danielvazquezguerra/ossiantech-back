<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;



//Obtenemos los datos desde la Api. 

Route::get('/prueba', function(){

    $client = new Client([

        'base_uri' => 'http://internal.ossian.tech/api/Sample',
        'timeout'  => 2.0,
    
    ]);
    
    $response = $client->request('GET');    

    return response()->json(['results'=>$response], 200);

});
