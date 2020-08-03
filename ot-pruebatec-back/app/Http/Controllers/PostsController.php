<?php 

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;


class PostsController {

    
    public function addPost(Request $request)
    //Para añadir un el post. 
        
    {
        try {

            $body = $request->all();

            if($request->has('url')){
                $imageName = time() . '-' . request()->url->getClientOriginalName(); 
                request()->url->move('images/posts', $imageName); 
                $body['url'] = $imageName;    
                
            }

            $post = Post::create($body);
            return response($post, 201);

        } catch (\Exception $e) {

            return response([
                'message' => 'There was an error trying to register the user',
                'error' => $e->getMessage()
            ], 500);

        }
    }

    public function getPostAll(Request $request)
    //Obtenemos todos los post. 

    {
        try {

            $posts = Post::all();
            return response()->json(['posts'=>$posts], 200);    

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
    //Actualizamos el post. 

    {
        
        $post = Post::find($id);
        if($request->has('name')) {
            $post->post = $request->post();
        }

        $post->save();

        return response()->json(['data'=>$post], 201);
    }

    public function delete($id)
    //Borramos el post.

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