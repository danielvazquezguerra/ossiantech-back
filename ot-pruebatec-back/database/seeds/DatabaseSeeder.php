<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    
    {
        Post::truncate();
     
        $api_ossian = 'http://internal.ossian.tech/api/Sample';
        $res = file_get_contents($api_ossian);
        $res = json_decode($res);
        $images = $res->result;
        foreach ($images as $image) {
           DB::table('posts')->insert([

                'title' => $image->title,
                'description' => $image->description,
                'category' => $image->category,
                'url' => $image->url

            ]); 
        }
    }
}
