<?php 

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;


class PostsController {

    
    //Para añadir un el post. 
    public function addPost(Request $request)
        
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

    //Obtenemos todos los post. 
    public function getPostAll(Request $request)

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

    //Actualizamos el post. 
    public function edit( Request $request, $id)

    {
        
        try {
            
            $post = Post::find($id);
        
            if ($request->has('title')) {
                $post->title=$request->title;
            }
            if ($request->has('description')) {
                $post->category=$request->category;
            }
            if ($request->has('category')) {
                $post->description=$request->description;
            }
            if($request->has('url')) {
                $imageName = time() . '-' . request()->url->getClientOriginalName(); 
                request()->url->move('images/posts', $imageName); 
                $body['url'] = $imageName;    
                
            }
            
            $post->save();
        
            return response()->json(['data'=>$post], 201);

        }catch (\Exception $exception) {

            return response($exception, 500);

        }

    
    }

    public function delete($id)
    //Borramos el post.

    {
        try {
            $post = Post::find($id);
            $post->delete();
            return response([
                'message' => 'Post eliminado',
                'product' => $post
            ]);
        } catch (\Exception $e) {
            return response([
                'error' => $e,
            ], 500);
        }
    }



}