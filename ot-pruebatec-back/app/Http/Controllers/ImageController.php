<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Image;


class ImageController extends Controller
{

    public function getImageAll(Request $request)
    {
        try {
            $body = Image::orderBy('id','DESC')->get();   
            return response($body->load('user.recipe.likes','likes'), 201);
        } catch (\Exception $e) {
            return response([
                'message' => 'Creo que ha habido un error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
