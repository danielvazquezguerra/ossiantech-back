<?php 

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;


class PostsController {

    public function getPostAll(Request $request)

    {
        try {
            $posts = Post::all();
            return response()->json(['data'=>$posts], 200);

        } catch (\Exception $e) {

            return response([
                'message' => 'Algo no está bien',
                'error' => $e->getMessage()
            ], 500);
        }
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function edit($request, $id)
    {
        
        $post = Post::find($id);
        if($request->has('name')) {
            $post->post = $request->post();
        }

        $post->save();

        return response()->json(['data'=>$post], 201);
    }

    public function delete($id)
    {
        try {
            $post = Post::find($id);
            $post->delete();
            return response([
                'message' => 'Post eliminado con éxito',
                'product' => $post
            ]);
        } catch (\Exception $e) {
            return response([
                'error' => $e,
            ], 500);
        }
    }



}